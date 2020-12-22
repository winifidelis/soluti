@if (session('arquivoEnviados'))
setTimeout(function() {
toastr.options = {
closeButton: true,
progressBar: true,
showMethod: 'slideDown',
timeOut: 4000
};
toastr.success("{{session('arquivoEnviados')}}", 'Arquivops enviados');
}, 1300);
@endif

@if (session('arquivoErro'))
setTimeout(function() {
toastr.options = {
closeButton: true,
progressBar: true,
showMethod: 'slideDown',
timeOut: 4000
};
toastr.success("{{session('arquivoErro')}}", 'Erro');
}, 1300);
@endif

@if (session('grupoCadastrado'))
setTimeout(function() {
toastr.options = {
closeButton: true,
progressBar: true,
showMethod: 'slideDown',
timeOut: 4000
};
toastr.success("{{session('grupoCadastrado')}}", 'Grupo cadastrado');
}, 1300);
@endif

@if (session('emailExiste'))
setTimeout(function() {
toastr.options = {
closeButton: true,
progressBar: true,
showMethod: 'slideDown',
timeOut: 4000
};
toastr.success("{{session('emailExiste')}}", 'Erro');
}, 1300);
@endif

@if (session('userCadastrado'))
setTimeout(function() {
toastr.options = {
closeButton: true,
progressBar: true,
showMethod: 'slideDown',
timeOut: 4000
};
toastr.success("{{session('userCadastrado')}}", 'Usuários cadastrado');
}, 1300);
@endif