import './bootstrap';
import './tabs';

var deleteClientButtons = document.getElementsByClassName("deleteClient");
for (var i = 0; i < deleteClientButtons.length; i++) {
    deleteClientButtons[i].addEventListener("click", function() {
        let thiz = this
        axios.delete('/client/' + this.getAttribute('data-id'))
            .then(function (response) {
                thiz.closest("tr").remove()
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}
