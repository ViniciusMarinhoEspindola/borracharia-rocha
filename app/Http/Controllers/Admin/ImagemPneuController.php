<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Pneus;
use App\Models\ImagemPneu;

class ImagemPneuController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pneus  $pneu
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pneus $pneu)
    {
        if($request->has('file') && !empty($request->file)) {
            try {
                $filename = time().'-'.$request->file->getClientOriginalName();

                $request->file->storeAs('uploads/pneus', $filename);

                ImagemPneu::create([
                    'img' => $filename,
                    'ordem' => 999,
                    'pneu_id' => $pneu->id
                ]);

                session()->flash('success', 'Imagem do pneu adicionada com sucesso!');
                return response()->json('Imagem do pneu adicionada com sucesso!', 500);
            } catch(\Exception $e) {
                \Log::error('Erro ao cadastrar pneu: ' . $e->getMessage());

                session()->flash('error', 'Ocorreu um erro ao tentar adicionar a imagem do pneu! Tente novamente.');
                return response()->json('Ocorreu um erro ao tentar adicionar a imagem do pneu! Tente novamente.', 200);
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reorder(Request $request)
    {
        foreach($request->order as $key => $id) {
            ImagemPneu::findOrFail($id)->update(['ordem' => $key]);
        }

        return response()->json('Reordenado com sucesso!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImagemPneu  $imgPneu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img_pneu = ImagemPneu::findOrFail($id);

        try {
            try {
                unlink(storage_path('app/uploads/pneus/' . $img_pneu->img));
            } catch(\Exception $e) {
                \Log::error('Erro ao deletar o arquivo de imagem do pneu: ' . $e->getMessage());
            }

            $img_pneu->delete();
        } catch(\Exception $ex) {
            \Log::error('Erro ao deletar a imagem do pneu: ' . $e->getMessage());

            return back()->withError('Ocorreu um erro ao tentar remover a imagem do pneu! Tente novamente.');
        }

        return back()->withSuccess('Imagem deletada com sucesso!');
    }
}
