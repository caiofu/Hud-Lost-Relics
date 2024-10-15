// Inicializa o Quill
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: '#toolbar'
    }
});
AtualizaMensagens();


function sendMessage() {
    const message = quill.root.innerHTML; // Captura o conteúdo HTML
    var alertMsg = document.getElementById('alertMsg');
    var editor = document.getElementById('editor');
    if (message == '<p><br></p>') {
        console.log('nao pode ser vazio')
        alertMsg.style.display = '';
        editor.style.border = '1px solid red';
    }
    else {
        Carregamento(true, 'Registering message');
        var name = document.getElementById('name');
        var nickname = document.getElementById('nickname');


        var campos = new FormData();
        campos.append('name', name.value);
        campos.append('nickname', nickname.value);
        campos.append('mensagem', message);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "enviaMensagem.php");
        xhr.send(campos);
        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {

                var resposta = JSON.parse(xhr.response);
                console.log(resposta)

                switch (resposta[0].codigo) {
                    case 1:
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'The message has been recorded',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        AtualizaMensagens();
                        break;
                    case 2:
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            allowOutsideClick: false,
                            text: 'Error recording message'
                        })
                        break;

                    case 3:
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            allowOutsideClick: false,
                            text: 'The fields are empty!'
                        })
                        break;

                    default:
                        break;
                }
            }
        }

        quill.setText(''); // Limpa o editor após enviar
        alertMsg.style.display = 'none';
        editor.style.border = '';
        name.value = '';
        nickname.value = '';

    }

}

function AtualizaMensagens() {
    listMensagens.innerHTML = "";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "buscaMensagens.php");
    xhr.send();
    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {
            var listMensagens = document.getElementById('listMensagens');
            var resposta = JSON.parse(xhr.response);
            
            if (resposta.length > 0) {
                resposta.forEach(mensagem => {
                    listMensagens.innerHTML += '<div class="card mb-3">' +
                        '<div class="card-header">' +
                        '<h5 class="card-title">' + mensagem.name + '</h5>' +
                        '<h6 class="card-subtitle mb-2 text-muted">Nickname: ' + mensagem.nickname + '</h6>' +
                        '</div>' +
                        '<div class="card-body">' +
                        ' <p class="card-text">' + mensagem.mensagem + '</p>' +
                        '</div>' +
                        '<div class="card-footer text-muted">' +
                        'Comment Date: ' + mensagem.dataMensagem +
                        '</div>' +
                        '</div>';
                });
            }
            else {
                listMensagens.innerHTML = 'No comments yet.';
            }
        }
    }
}


function Carregamento(ativo, titulo) {
    if (ativo) {

        Swal.fire({
            title: "<strong>" + titulo + "</strong>",

            html: `
            <div align="center" style="margin-top: 20px;">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">

            </div>
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">

            </div>
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">

            </div>
        </div>
    </div>
            `,
            showCloseButton: false,
            showConfirmButton: false,
            showCancelButton: false,
            focusConfirm: false,
            allowOutsideClick: false,
        });
    }
    else {
        setTimeout(() => {
            Swal.close();
        }, 2000); //Aguarda 2 segundos.
    }
}