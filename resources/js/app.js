require('./bootstrap');

window.sweetAlert = require('sweetalert2');


window.addEventListener("DOMContentLoaded", function()
{
    const loading = document.querySelector('.loading');

    loading.show = function(){
        this.classList.add('absolute');
        this.classList.remove('hidden');
    }

    loading.hide = function(){
        this.classList.add('hidden');
        this.classList.remove('absolute');
    }

    const subscribeForm = document.getElementById('subscribe-form');
    const firstname = document.getElementById('firstname');
    const lastname = document.getElementById('lastname');
    const email = document.getElementById('email');
    const inputNodeNames = ['firstname', 'lastname', 'email'];

    subscribeForm.addEventListener("submit", function(event)
    {
        event.preventDefault();
        loading.show();
        clearErrors();
        axios.post("/api/v1/newsletter/subscribe", {
            firstname: firstname.value,
            lastname: lastname.value,
            email: email.value,
        })
            .then(function(response){
                loading.hide();
                //clear inputs
                clearInputValues();
                //show flash message
                sweetAlert.fire({icon: 'success', 'title': 'Success', 'text': 'You have subscribed successfully',});
                console.log(response)
            })
            .catch(function(error){
                loading.hide();
                if ( error.response.data ){
                    const errors = error.response.data.errors;
                    console.log(errors, errors.hasOwnProperty('firstname'));

                    inputNodeNames.forEach((item) =>
                    {
                        if (errors.hasOwnProperty(item)){
                            displayError(item, errors[item][0]);
                        }
                    });
                }
            });
    });

    function removeNextSibling(referenceNode){
        if ( document.getElementById(referenceNode).nextSibling ){
            document.getElementById(referenceNode).nextSibling.remove();
        }
    }

    function insertAfter (referenceNode, newNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    function displayError(formId, errorMessage){
        const input = document.getElementById(formId);
        let span =  document.createElement('span');
        span.classList.add('text-red-600');span.classList.add('font-medium');
        span.classList.add('text-sm');span.classList.add('pl-2');
        span.textContent = errorMessage;
        insertAfter(input, span);
    }

    function clearErrors(nodes = inputNodeNames){
        nodes.forEach((item) => {
            removeNextSibling(item);
        })
    }

    function clearInputValues(nodes = inputNodeNames){
        nodes.forEach((item) => {
            if ( document.getElementById(item).value ){
                document.getElementById(item).value = "";
            }
        })
    }
});

