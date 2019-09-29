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
            cpf: modal.find('.modal-body form input#cpf').val(),
            birth_date: modal.find('.modal-body form input#birth-date').val(),
            email: modal.find('.modal-body form input#email').val(),
            status: (modal.find('.modal-body form input#status').is(":checked")) ? 1 : 0,
            phone: modal.find('.modal-body form input#phone').val(),
            mobile: modal.find('.modal-body form input#mobile').val(),
            zipcode: modal.find('.modal-body form input#zipcode').val(),
            street: modal.find('.modal-body form input#street').val(),
            number: modal.find('.modal-body form input#number').val(),
            neighbour: modal.find('.modal-body form input#neighbour').val(),
            city: modal.find('.modal-body form input#city').val(),
            state: modal.find('.modal-body form input#state').val()
        }

        axios.post(url, data)
        .then((response) =>{
            toastr.success(`Estudante ${response.data.student.name} cadastrado`)
        })
        .catch((error) => {
            toastr.error('Erro')
            console.log(error)
        })

        // setTimeout(() => {
        //     $(location).attr('href', url)
        // }, 4000);

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
        var email = response.data.student.email
        var phone = response.data.student.contacts[0].phone
        var mobile = response.data.student.contacts[0].mobile
        var street = response.data.student.address[0].street
        var number = response.data.student.address[0].number
        var neighbour = response.data.student.address[0].neighbour
        var zipcode = response.data.student.address[0].zipcode
        var city = response.data.student.address[0].city
        var state = response.data.student.address[0].state

        var modal = $(this)

        var formatedDate = moment(birthDate).format('D/MM/Y')

        modal.find('.modal-title').text(`Dados do estudante ${name}`)

        modal.find('.modal-body input#name').val(name)
        modal.find('.modal-body input#cpf').val(cpf)
        modal.find('.modal-body input#birth-date').val(formatedDate)
        modal.find('.modal-body input#email').val(email)
        modal.find('.modal-body input#status').val(status)
        modal.find('.modal-body input#phone').val(phone)
        modal.find('.modal-body input#mobile').val(mobile)
        modal.find('.modal-body input#street').val(street)
        modal.find('.modal-body input#number').val(number)
        modal.find('.modal-body input#neighbour').val(neighbour)
        modal.find('.modal-body input#zipcode').val(zipcode)
        modal.find('.modal-body input#city').val(city)
        modal.find('.modal-body input#state').val(state)
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
        var cpf = response.data.student.cpf
        var birthDate = response.data.student.birth_date
        var email = response.data.student.email
        var phone = response.data.student.contacts[0].phone
        var mobile = response.data.student.contacts[0].mobile
        var street = response.data.student.address[0].street
        var number = response.data.student.address[0].number
        var neighbour = response.data.student.address[0].neighbour
        var zipcode = response.data.student.address[0].zipcode
        var city = response.data.student.address[0].city
        var state = response.data.student.address[0].state

        var modal = $(this)

        var formatedDate = moment(birthDate).format('D/MM/Y')

        modal.find('.modal-title').text(`Dados do estudante ${name}`)

        modal.find('.modal-body input#name').val(name)
        modal.find('.modal-body input#cpf').val(cpf)
        modal.find('.modal-body input#birth-date').val(formatedDate)
        modal.find('.modal-body input#email').val(email)
        modal.find('.modal-body input#phone').val(phone)
        modal.find('.modal-body input#mobile').val(mobile)
        modal.find('.modal-body input#street-update').val(street)
        modal.find('.modal-body input#number-update').val(number)
        modal.find('.modal-body input#neighbour-update').val(neighbour)
        modal.find('.modal-body input#zipcode-update').val(zipcode)
        modal.find('.modal-body input#city-update').val(city)
        modal.find('.modal-body input#state-update').val(state)

    })

    buttonUpdate.click(() => {

        data = {
            id: id,
            name: modal.find('.modal-body input#name').val(),
            cpf: modal.find('.modal-body input#cpf').val(),
            birth_date: modal.find('.modal-body input#birth-date').val(),
            email: modal.find('.modal-body input#email').val(),
            phone: modal.find('.modal-body input#phone').val(),
            mobile: modal.find('.modal-body input#mobile').val(),
            street: modal.find('.modal-body input#street-update').val(),
            number: modal.find('.modal-body input#number-update').val(),
            neighbour: modal.find('.modal-body input#neighbour-update').val(),
            zipcode: modal.find('.modal-body input#zipcode-update').val(),
            city: modal.find('.modal-body input#city-update').val(),
            state: modal.find('.modal-body input#state-update').val()
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

$('#zipcode').on('blur', function () {

    var zipcode = $(this).val()

    if (zipcode.length == 8) {

        axios.get(`https://viacep.com.br/ws/${zipcode}/json/`)
        .then((response) => {

            $('#street').val('')
            $('#number').val('')
            $('#neighbour').val('')
            $('#city').val('')
            $('#state').val('')
            
            var address = {
                street: response.data.logradouro,
                neighbour: response.data.bairro,
                city: response.data.localidade,
                state: response.data.uf,
            }

            $('#street').val(address.street)
            $('#neighbour').val(address.neighbour)
            $('#city').val(address.city)
            $('#state').val(address.state)

            $('#number').focus()
        })
        .catch(() => {
            $('#zipcode #zipcode-update').addClass('text-danger').val('CEP inválido')
        })

    } else {
        $('#zipcode $zipcode-update').addClass('text-danger is-invalid').val('Formato de CEP inválido')
    }

})

$('#zipcode-update').on('blur', function () {

    var zipcode = $(this).val()

    if (zipcode.length == 8) {

        axios.get(`https://viacep.com.br/ws/${zipcode}/json/`)
        .then((response) => {
            
            var address = {
                street: response.data.logradouro,
                neighbour: response.data.bairro,
                city: response.data.localidade,
                state: response.data.uf,
            }

            $('#street-update').val(address.street)
            $('#neighbour-update').val(address.neighbour)
            $('#city-update').val(address.city)
            $('#state-update').val(address.state)

            $('#number-update').focus()
        })
        .catch(() => {
            $('#zipcode-update').addClass('text-danger').val('CEP inválido')
        })

    } else {
        $('#zipcode-update').addClass('text-danger is-invalid').val('Formato de CEP inválido')
    }

})

$('#zipcode').on('focus', function() {
    $(this).removeClass('text-danger is-invalid').val('')
})

$('#zipcode-update').on('focus', function() {
    $(this).removeClass('text-danger is-invalid').val('')
})


$('#add-student').on('click', () => {

    var selectedStudentId = $('#select-students').children("option:selected").val()
    var selectedStudentName = $('#select-students').children("option:selected").html()

    var students = $('#students-list').children().each((i, v) => {
        return v
    })

    if (selectedStudentId == 0) {

        toastr.warning('É preciso escolher um estudante')
        
    } else {

        $('#list').removeClass('d-none')

        if (students.length == 0) {
            
            $('#students-list').append(`<li class="list-group-item d-flex justify-content-between align-items-center" value="${selectedStudentId}">${selectedStudentName}<button type="button" id="student-remove" data-id="${selectedStudentId}" class="btn btn-outline-danger"><i class="fas fa-times"></i></button></li>`)
    
        } else {
    
            if (students.length > 40) {
    
                toastr.warning('Curso com o limite máximo de estudantes')
                
            } else {

                var exists = students.map((i, v) => {
                    console.log(v['value'])
                    //console.log(selectedStudentId)

                    return (v['value'] == selectedStudentId) ? true : false 
                })
                
                if (exists[0]) {
                    
                    toastr.warning('Estudante já adicionado')
        
                } else {
                    
                    $('#students-list').append(`<li class="list-group-item d-flex justify-content-between align-items-center" value="${selectedStudentId}">${selectedStudentName}<button type="button" id="student-remove" data-id="${selectedStudentId}" class="btn btn-outline-danger"><i class="fas fa-times"></i></button></li>`)
        
                }
    
            }        
    
        }
        
    }

})

$('body').on('click', '#student-remove', () => {

    $('#student-remove').parent().remove()

    var students = $('#students-list').children().each((i, v) => {
        return v
    })

    if (students.length == 0) {
        
        $('#list').addClass('d-none')

    }

    console.log()

})
