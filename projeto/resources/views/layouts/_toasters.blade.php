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

