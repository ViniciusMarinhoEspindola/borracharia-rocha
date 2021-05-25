<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12 text-center">
                <h2 class="mt-0">Entre em contato!</h2>
                <hr class="divider my-4" />
                <p class="text-muted mb-5">Abaixo disponibilizamos nossas formas de contato para atende-lo da melhor forma</p>
            </div>
        </div>
        <div class="row">

            <section class="col-md-6 col-sm-12 d-flex justify-content-center text-muted">
                <form action="{{ route('contato') }}" method="POST">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-muted text-center mb-4">Envie uma mensagem</h4>
                        </div>
                        <div class="from-group col-12 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') border-danger @enderror" name="name" value="{{ old('name') }}" id="name">
                            @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="from-group col-md-7 mb-3">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control @error('email') border-danger @enderror" name="email" value="{{ old('email') }}" id="email">
                            @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @enderror
                        </div>
                        <div class="from-group col-md-5 mb-3">
                            <label for="phone">Telefone</label>
                            <input type="text" onkeypress="mask(this, mphone);" class="form-control @error('phone') border-danger @enderror" name="phone" value="{{ old('phone') }}" id="phone">
                            @error('phone')
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @enderror
                        </div>
                        <div class="from-group col-12 mb-3">
                            <label for="msg">Mensagem</label>
                            <textarea type="text" class="form-control @error('msg') border-danger @enderror" rows="5" name="msg" id="msg">{{ old('msg') }}</textarea>
                            @error('msg')
                                <small class="text-danger">{{ $errors->first('msg') }}</small>
                            @enderror
                        </div>
                        <div class="from-group col-12 mb-3">
                            <button type="submit" class="btn btn-danger"><small>Enviar Mensagem</small></button>
                        </div>
                    </div>
                </form>

            </section>
            <section class="col-md-6 col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3643.907436362297!2d-46.51732358437367!3d-24.034329085114596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1f7de9b63239%3A0xc9af64242b97efbb!2sAv.%20Hermenegildo%20Pereira%20de%20Fran%C3%A7a%2C%20149%20-%20Balne%C3%A1rio%20Esmeralda%2C%20Praia%20Grande%20-%20SP%2C%2011713-290!5e0!3m2!1spt-BR!2sbr!4v1621880222820!5m2!1spt-BR!2sbr" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                <div class="col-lg-12 text-center text-muted d-flex align-items-center mb-2">
                    <i class="fas fa-map-marker-alt fa-2x"></i>
                    <a class="text-muted" href="https://www.google.com.br/maps/place/Borracharia+Rocha/@-24.0343751,-46.5147664,18.28z/data=!4m5!3m4!1s0x94ce1fb4a21646cd:0x216ffe7d167e7a24!8m2!3d-24.0343378!4d-46.5151401" target="_blank">Av. Hermenegildo Pereira de França, 149   Balneário Esmeralda</a>
                </div>

                <div class="col-lg-12 text-center text-muted d-flex align-items-center">
                    <i class="fab fa-whatsapp fa-2x"></i>
                    <a class=" text-muted ml-5" href="https://api.whatsapp.com/send?phone=5513981400942" target="_blank">(13)98140-0942</a>
                </div>


            </section>

        </div>
    </div>
</section>

<script>
    function mask(o, f) {
        setTimeout(function() {
            var v = mphone(o.value);
            if (v != o.value) {
                o.value = v;
            }
        }, 1);
    }

    function mphone(v) {
        var r = v.replace(/\D/g, "");
        r = r.replace(/^0/, "");
        if (r.length > 10) {
            r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (r.length > 5) {
            r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (r.length > 2) {
            r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
            r = r.replace(/^(\d*)/, "($1");
        }

        return r;
    }
</script>