$(document).ready(function () {
    $('.delete-operation').click(function (e) {
        e.preventDefault();
        let delete_action  = $(this);
        if (confirm("Voulez-vous vraiment supprimer cette opération!") == false) {
            return false;
        }
        let data_id = $(this).attr('data-id');
        axios
            .post('/page/delete', {
                data_id: data_id
            })
            .then(function (response) {
                $(delete_action).parent().parent().hide('slow');
                $('#total-caisse h1').html(`${response.data.total_caisse} €`);
            })
    });
});
