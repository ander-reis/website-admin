@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 text-center">
        <p><h2>Instruções de cadastro</h2></p>
    </div>
</div>

<br />

<div class="row">
    <div class="col-md-12">
        <ol>
            <li>Os links devem constar o endereço completo do site: <b>http://www.sinprosp.org.br</b></li>
            <br />

            <li>Quando for necessário <strong>adicionar Imagem</strong>: <br />
                <ol>
                    <li>Após fazer o Upload da imagem, alterar a URL: <br />
                        <strong>de:</strong> https://admin.sinprosp.org.br <br />
                        <strong>para:</strong> http://www.sinprosp.org.br</li>
                    <br />

                    <li>Acessar o código fonte da notícia e na tag IMG, acrescentar: <span style="color:red;">class="img-fluid"</span></li>
                </ol>
            </li>
            <br />

            <li>Quando for necessário <strong>adicionar Vídeo</strong>: <br />
                <ol>
                    <li>
                        Acessar o código fonte da notícia e montar a seguinte estrutura:</li>
                        &lt;div class="videoWrapper" style="margin:30px 0"&gt;
                        <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aqui ficará o iframe do vídeo (incorporar do Youtube).
                        <br />
                        &lt;/div&gt;
                    </li>
                    <br />

                </ol>
            </li>
            <br />
        </ol>
    </div>
</div>

@endsection()
