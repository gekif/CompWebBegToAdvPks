// Ajaxify the whole data from the process_ajax.php
function ajax_func(process_name = 'process_ajax.php') {

    // Instansiate the ajax
    xmlhttp = new XMLHttpRequest();

    // Ajax ready state
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
        }
    };

    // Ajax processing from here
    xmlhttp.open('GET', process_name, true);

    // Ajax ending
    xmlhttp.send();

}


// Inserting data to database
function submit_form() {
    let username = document.getElementById('username').value,
        email = document.getElementById('email').value,
        contactNumber = document.getElementById('contactnumber').value,
        notes = document.getElementById('notes').value;
    let user_form = document.getElementById('user_form');

    ajax_func('process_ajax.php?submit_form=yes' +
        '&username=' + username +
        '&email=' + email +
        '&contactnumber=' + contactNumber +
        '&notes=' + notes
    );

    $('#add_new_person').modal('hide');
    user_form.reset();

    return false;
}


// Deleting data from database
function delete_func(del_id) {
    ajax_func('process_ajax.php?del_id=' + del_id);
}

// Editing data from database
function  edit_form(edit_id) {
    let edit_username = document.getElementById('edit_username' + edit_id).value,
        edit_email = document.getElementById('edit_email' + edit_id).value,
        edit_contactnumber = document.getElementById('edit_contactnumber' + edit_id).value,
        edit_notes = document.getElementById('edit_notes' + edit_id).value;

    let edit_form = document.getElementById('edit_form' + edit_id);

    ajax_func('process_ajax.php?edit_form=yes&edit_id=' + edit_id +
        '&edit_username=' + edit_username +
        '&edit_email=' + edit_email +
        '&edit_contactnumber=' + edit_contactnumber +
        '&edit_notes=' + edit_notes
    );

    $('#edit_person' + edit_id).modal('hide');
    edit_form.reset();

    return false
}