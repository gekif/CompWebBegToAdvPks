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
    let user_form = document.getElementById('user_form');

    let username = document.getElementById('username').value,
        email = document.getElementById('email').value,
        contactNumber = document.getElementById('contactnumber').value,
        notes = document.getElementById('notes').value;

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
function delete_func(user_id) {
    ajax_func('process_ajax.php?del_id=' + user_id);
}