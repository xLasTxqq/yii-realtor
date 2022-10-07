let select = document.querySelector('#applicationmodel-status');
let date_meeting = document.querySelector('.field-applicationmodel-date_meeting');
let manager_comment = document.querySelector('.field-applicationmodel-manager_comment');

function check() {
    if (select.value === 'processed') {
        date_meeting.classList.remove("d-none")
        date_meeting.children.item(1).required = true
        manager_comment.classList.remove("d-none")
        manager_comment.children.item(1).required = true
    } else {
        date_meeting.classList.add("d-none")
        date_meeting.children.item(1).required = false
        manager_comment.classList.add("d-none")
        manager_comment.children.item(1).required = false
    }
}
check()
select.addEventListener('change', check);