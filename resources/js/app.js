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
            .then(() =>{
                toastr.success(`Insituição atualizada`)
            })
            .catch(() => {
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
                    toastr.success('Instituição desativada', '')      
                } else {
                    toastr.success('Instituição ativada', '')
                }

            })

            modal.find('modal-footer button.close').click()

            setTimeout(() => {
                $(location).attr('href', url)
            }, 4000);

    })
    
})

$('#courseRegisterModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)

    // Extrai informação dos atributos data-*
    var url = button.data('url')
    var buttonRegister = modal.find('.modal-footer button#register')

    buttonRegister.click(() => {

        data = {
            name: modal.find('.modal-body form input#name').val(),
            status: (modal.find('.modal-body form input#status').is(":checked")) ? 1 : 0
        }

        axios.post(url, data)
        .then((response) =>{
            toastr.success(`Curso ${response.data.course.name} cadastrado`)
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

$('#courseShowModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    
    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var url = button.data('url')

    req = `${url}/info/${id}`

    axios.get(req)
    .then((response) => {

        var name = response.data.course.name
        var status = (response.data.course.status == 1) ? 'Ativo' : 'Inativo'

        var modal = $(this)

        modal.find('.modal-title').text(`Dados do curso ${name}`)

        modal.find('.modal-body input#name').val(name)
        modal.find('.modal-body input#status').val(status)
    })
    
})

$('#courseUpdateModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)

    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var url = button.data('url')
    var buttonUpdate = modal.find('.modal-footer button#update')

    req = `${url}/info/${id}`

    axios.get(req)
    .then((response) => {

        var name = response.data.course.name

        modal.find('.modal-body input#name').val(name)

    })

    buttonUpdate.click(() => {

        data = {
            name: modal.find('.modal-body form input#name').val()
        }

        req = `${url}/update/${id}`

        axios.post(req, data)
            .then(() =>{
                toastr.success(`Curso atualizado`)
            })
            .catch(() => {
                toastr.error('Erro')
            })

        modal.find('modal-footer button#close').click()

        setTimeout(() => {
            $(location).attr('href', url)
        }, 4000)
    
    })

})

$('#courseStatusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)
    
    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var status = button.data('status')
    var name = button.data('name')
    var url = button.data('url')
    var buttonStatus = modal.find('.modal-footer button#status')

    if (status == 1) {
        modal.find('.modal-body p.text-status').text(`Deseja desativar o curso ${name}?`)
        buttonStatus.removeClass().addClass('btn btn-danger')
        buttonStatus.text('Desativar')    
    } else {
        modal.find('.modal-body p.text-status').text(`Deseja ativar o curso ${name}?`)
        buttonStatus.removeClass().addClass('btn btn-success')
        buttonStatus.text('Ativar')
    }
    
    buttonStatus.click(() => {

        var req = `${url}/toggle/${id}`

        axios.get(req)
            .then((response) => {

                //$(location).attr('href', url)

                if (response.data.status == 0) {
                    toastr.success('Curso desativado', '')      
                } else {
                    toastr.success('Curso ativado', '')
                }

            })

            modal.find('modal-footer button.close').click()

            setTimeout(() => {
                $(location).attr('href', url)
            }, 4000);

    })
    
})

$('#studentRegisterModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)

    // Extrai informação dos atributos data-*
    var url = button.data('url')
    var buttonRegister = modal.find('.modal-footer button#register')

    buttonRegister.click(() => {

        data = {
            name: modal.find('.modal-body form input#name').val(),
            status: (modal.find('.modal-body form input#status').is(":checked")) ? 1 : 0
        }

        axios.post(url, data)
        .then((response) =>{
            toastr.success(`Estudante ${response.data.student.name} cadastrado`)
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

$('#studentShowModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    
    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var url = button.data('url')

    req = `${url}/info/${id}`

    axios.get(req)
    .then((response) => {

        var name = response.data.student.name
        var cpf = response.data.student.cpf
        var birthDate = response.data.student.birth_date
        var email = response.data.student.email
        var status = (response.data.student.status == 1) ? 'Ativo' : 'Inativo'

        var modal = $(this)

        modal.find('.modal-title').text(`Dados do estudante ${name}`)

        modal.find('.modal-body input#name').val(name)
        modal.find('.modal-body input#cpf').val(cpf)
        modal.find('.modal-body input#birth-date').val(birthDate)
        modal.find('.modal-body input#email').val(email)
        modal.find('.modal-body input#status').val(status)
    })
    
})

$('#studentUpdateModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)

    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var url = button.data('url')
    var buttonUpdate = modal.find('.modal-footer button#update')

    req = `${url}/info/${id}`

    axios.get(req)
    .then((response) => {

        var name = response.data.student.name

        modal.find('.modal-body input#name').val(name)

    })

    buttonUpdate.click(() => {

        data = {
            name: modal.find('.modal-body form input#name').val()
        }

        req = `${url}/update/${id}`

        axios.post(req, data)
            .then(() =>{
                toastr.success(`Estudante atualizado`)
            })
            .catch(() => {
                toastr.error('Erro')
            })

        setTimeout(() => {
            $(location).attr('href', url)
        }, 4000)
    
    })

})

$('#studentStatusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var modal = $(this)
    
    // Extrai informação dos atributos data-*
    var id = button.data('id')
    var status = button.data('status')
    var name = button.data('name')
    var url = button.data('url')
    var buttonStatus = modal.find('.modal-footer button#status')

    if (status == 1) {
        modal.find('.modal-body p.text-status').text(`Deseja desativar o estudante ${name}?`)
        buttonStatus.removeClass().addClass('btn btn-danger')
        buttonStatus.text('Desativar')    
    } else {
        modal.find('.modal-body p.text-status').text(`Deseja ativar o estudante ${name}?`)
        buttonStatus.removeClass().addClass('btn btn-success')
        buttonStatus.text('Ativar')
    }
    
    buttonStatus.click(() => {

        var req = `${url}/toggle/${id}`

        axios.get(req)
            .then((response) => {

                if (response.data.status == 0) {
                    toastr.success('Estudante desativado', '')      
                } else {
                    toastr.success('Estudante ativado', '')
                }

            })

            modal.find('modal-footer button.close').click()

            setTimeout(() => {
                $(location).attr('href', url)
            }, 4000);

    })
    
})