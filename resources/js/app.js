/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

$('#institutionRegisterModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)

    // Extrai informação dos atributos data-*
    var url = button.data('url')
    var buttonRegister = modal.find('.modal-footer button#register')

    buttonRegister.click(() => {

        data = {
            name: modal.find('.modal-body form input#name').val(),
            cnpj: modal.find('.modal-body form input#cnpj').val(),
            status: (modal.find('.modal-body form input#status').is(":checked")) ? 1 : 0
        }

        axios.post(url, data)
        .then((response) =>{
            toastr.success(`Insituição ${response.data.institution.name} cadastrada`)
        })
        .catch((error) => {
            toastr.error('Erro')
        })

        modal.find('modal-footer button#close').click()

        setTimeout(() => {
            $(location).attr('href', url)
        }, 4000);

    })

})

$('#institutionShowModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    
    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var url = button.data('url')

    req = `${url}/info/${id}`

    axios.get(req)
    .then((response) => {

        var name = response.data.institution.name
        var cnpj = response.data.institution.cnpj
        var status = (response.data.institution.status == 1) ? 'Ativo' : 'Inativo'

        var modal = $(this)

        modal.find('.modal-title').text(`Dados da instituição ${name}`)

        modal.find('.modal-body input#name').val(name)
        modal.find('.modal-body input#cnpj').val(cnpj)
        modal.find('.modal-body input#status').val(status)
    })
    
})

$('#institutionUpdateModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)

    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var url = button.data('url')
    var buttonUpdate = modal.find('.modal-footer button#update')

    req = `${url}/info/${id}`

    axios.get(req)
    .then((response) => {

        var name = response.data.institution.name
        var cnpj = response.data.institution.cnpj

        modal.find('.modal-body input#name').val(name)
        modal.find('.modal-body input#cnpj').val(cnpj)

    })

    buttonUpdate.click(() => {

        data = {
            name: modal.find('.modal-body form input#name').val(),
            cnpj: modal.find('.modal-body form input#cnpj').val(),
        }

        req = `${url}/update/${id}`

        axios.post(req, data)
            .then((response) =>{
                console.log(response.data)
                toastr.success(`Insituição atualizada`)
            })
            .catch((error) => {
                toastr.error('Erro')
            })

        modal.find('modal-footer button#close').click()

        setTimeout(() => {
            $(location).attr('href', url)
        }, 4000)
    
    })

})

$('#institutionStatusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)
    
    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var status = button.data('status')
    var name = button.data('name')
    var url = button.data('url')
    var buttonStatus = modal.find('.modal-footer button#status')

    if (status == 1) {
        modal.find('.modal-body p.text-status').text(`Deseja desativar a instituição ${name}?`)
        buttonStatus.removeClass().addClass('btn btn-danger')
        buttonStatus.text('Desativar')    
    } else {
        modal.find('.modal-body p.text-status').text(`Deseja ativar a instituição ${name}?`)
        buttonStatus.removeClass().addClass('btn btn-success')
        buttonStatus.text('Ativar')
    }
    
    buttonStatus.click(() => {

        var req = `${url}/toggle/${id}`

        axios.get(req)
            .then((response) => {

                //$(location).attr('href', url)

                if (response.data.status == 0) {
                    toastr.success('Desativado', 'Titulo')      
                } else {
                    toastr.success('Ativado', 'Titulo')
                }

            })

            modal.find('modal-footer button.close').click()

            setTimeout(() => {
                $(location).attr('href', url)
            }, 4000);

    })
    
})