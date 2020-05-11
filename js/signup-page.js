function username_validation()
{

    var div_field = document.getElementById('div-field-username');
    var username = document.getElementById('username_').value;
    var username_ = document.getElementById('username_');
    var div_username = document.getElementById('div-username');

    axios.get('http://localhost/bicproject/controllers/validation.contr.php?validation=username&username=' + username).
        then(function(response){

            console.log(response.data);
            var data = response.data;

            if (data === true)
            {

                if (!username_.classList.contains('is-success'))
                {

                    var span = document.createElement('SPAN');
                    var icon = document.createElement('I');
                    var paragraph = document.createElement('P');
                    var help_content = document.createTextNode('Usuário disponível!');
                    span.classList.add('icon', 'is-small', 'is-right');
                    icon.classList.add('far', 'fa-check-circle');
                    paragraph.classList.add('help', 'is-success');

                    span.appendChild(icon);
                    div_username.appendChild(span);
                    paragraph.appendChild(help_content);

                    if (username_.classList.contains('is-danger'))
                        username_.classList.replace('is-danger', 'is-success');
                    else
                        username_.classList.add('is-success');
                    
                    if (!div_username.classList.contains('has-icons-right'))
                        div_username.classList.add('has-icons-right');

                    if (div_username.childNodes[5])
                        div_username.replaceChild(span, div_username.childNodes[5]);
                    else
                        div_username.appendChild(span);

                    if (div_field.childNodes[3])
                        div_field.replaceChild(paragraph, div_field.childNodes[3]);
                    else
                        div_field.appendChild(paragraph);

                }

            }
            else
            {

                var span = document.createElement('SPAN');
                var icon = document.createElement('I');
                var paragraph = document.createElement('P');
                var help_content = document.createTextNode('Usuário indisponível!');
                span.classList.add('icon', 'is-small', 'is-right');
                icon.classList.add('fas', 'fa-exclamation-triangle');
                paragraph.classList.add('help', 'is-danger');

                span.appendChild(icon);
                div_username.appendChild(span);
                paragraph.appendChild(help_content);

                if (username_.classList.contains('is-success'))
                    username_.classList.replace('is-success', 'is-danger');
                else
                    username_.classList.add('is-danger');

                if (!div_username.classList.contains('has-icons-right'))
                    div_username.classList.add('has-icons-right');

                if (div_username.childNodes[5])
                    div_username.replaceChild(span, div_username.childNodes[5]);
                else
                    div_username.appendChild(span);

                if (div_field.childNodes[3])
                    div_field.replaceChild(paragraph, div_field.childNodes[3]);
                else
                    div_field.appendChild(paragraph);

            }

        })
        .catch(function(error){
            console.log(error);
        });

}

function email_validation()
{

    var div_field = document.getElementById('div-field-email');
    var email = document.getElementById('email_').value;
    var email_ = document.getElementById('email_');
    var div_email = document.getElementById('div-email');

    axios.get('http://localhost/bicproject/controllers/validation.contr.php?validation=email&email=' + email).
        then(function(response){

            console.log(response.data);
            var data = response.data;

            if (data === true)
            {

                if (!email_.classList.contains('is-success'))
                {

                    var span = document.createElement('SPAN');
                    var icon = document.createElement('I');
                    var paragraph = document.createElement('P');
                    var help_content = document.createTextNode('Email disponível!');
                    span.classList.add('icon', 'is-small', 'is-right');
                    icon.classList.add('far', 'fa-check-circle');
                    paragraph.classList.add('help', 'is-success');

                    span.appendChild(icon);
                    div_email.appendChild(span);
                    paragraph.appendChild(help_content);

                    if (email_.classList.contains('is-danger'))
                        email_.classList.replace('is-danger', 'is-success');
                    else
                        email_.classList.add('is-success');
                    
                    if (!div_email.classList.contains('has-icons-right'))
                        div_email.classList.add('has-icons-right');

                    if (div_email.childNodes[5])
                        div_email.replaceChild(span, div_email.childNodes[5]);
                    else
                        div_email.appendChild(span);

                    if (div_field.childNodes[3])
                        div_field.replaceChild(paragraph, div_field.childNodes[3]);
                    else
                        div_field.appendChild(paragraph);

                }

            }
            else
            {

                var span = document.createElement('SPAN');
                var icon = document.createElement('I');
                var paragraph = document.createElement('P');
                var help_content = document.createTextNode('Email indisponível!');
                span.classList.add('icon', 'is-small', 'is-right');
                icon.classList.add('fas', 'fa-exclamation-triangle');
                paragraph.classList.add('help', 'is-danger');

                span.appendChild(icon);
                div_email.appendChild(span);
                paragraph.appendChild(help_content);

                if (email_.classList.contains('is-success'))
                    email_.classList.replace('is-success', 'is-danger');
                else
                    email_.classList.add('is-danger');

                if (!div_email.classList.contains('has-icons-right'))
                    div_email.classList.add('has-icons-right');

                if (div_email.childNodes[5])
                    div_email.replaceChild(span, div_email.childNodes[5]);
                else
                    div_email.appendChild(span);

                if (div_field.childNodes[3])
                    div_field.replaceChild(paragraph, div_field.childNodes[3]);
                else
                    div_field.appendChild(paragraph);

            }

        })
        .catch(function(error){
            console.log(error);
        });

}