@extends('layouts.app')
@section('content')
<div class="container">
<x-breadcrumb currentURL="{{ request()->route()->uri }}

" />
</div>
    <div class="container py-5">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded ">
            <h1>Termos e Condições</h1>
            <p>Este é um exemplo de uma página de termos e condições para um repositório online, escrita em português
                europeu. Ao utilizar este repositório, você concorda com os seguintes termos e condições (atualizados em 12
                de novembro de 2023):</p>
            <ul>
                <li>Você é responsável pelo conteúdo que você publica, armazena ou compartilha neste repositório. Você
                    declara que possui os direitos autorais ou as licenças necessárias para utilizar o conteúdo.</li>
                <li>Você não deve publicar, armazenar ou compartilhar conteúdo que seja ilegal, ofensivo, difamatório,
                    obsceno, violento, discriminatório, ameaçador, fraudulento ou que viole os direitos de terceiros.</li>
                <li>Você não deve utilizar este repositório para fins comerciais, publicitários ou promocionais, sem a nossa
                    autorização prévia e por escrito.</li>
                <li>Você não deve utilizar este repositório para transmitir vírus, malware, spyware ou outros programas
                    maliciosos ou prejudiciais.</li>
                <li>Você não deve tentar obter acesso não autorizado a este repositório ou a qualquer conta, sistema ou rede
                    relacionada a ele.</li>
                <li>Você não deve interferir no funcionamento normal deste repositório ou na segurança dos dados nele
                    armazenados.</li>
                <li>Nós nos reservamos o direito de remover, editar ou bloquear qualquer conteúdo que viole estes termos e
                    condições, a nosso critério exclusivo.</li>
                <li>Nós nos reservamos o direito de suspender, cancelar ou limitar o seu acesso a este repositório, a
                    qualquer momento e por qualquer motivo, sem aviso prévio ou responsabilidade.</li>
                <li>Nós não garantimos a disponibilidade, a qualidade, a precisão, a integridade ou a confiabilidade deste
                    repositório ou de qualquer conteúdo nele contido. Você utiliza este repositório por sua conta e risco.
                </li>
                <li>Nós não somos responsáveis por quaisquer danos diretos, indiretos, incidentais, especiais,
                    consequenciais ou punitivos que possam resultar do seu uso ou da sua incapacidade de usar este
                    repositório ou de qualquer conteúdo nele contido.</li>
                <li>Estes termos e condições podem ser alterados periodicamente. Você deve verificar esta página
                    regularmente para se manter informado sobre as atualizações. O seu uso continuado deste repositório após
                    as alterações constitui a sua aceitação dos novos termos e condições.</li>
            </ul>
            <p>Se você tiver alguma dúvida ou comentário sobre estes termos e condições, por favor entre em contato conosco
                através do email exemplo@repositorio.com.</p>
        </div>

    </div>
@endsection
