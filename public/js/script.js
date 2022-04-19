var notyf = new Notyf({
    duration: 5000,
    position: {
        x: 'right',
        y: 'top',
    },
    dismissible: true,
    types: [
        {
            type: 'warning',
            background: 'orange',
            icon: false,
        },
    ]
});
window.addEventListener('notyf:success', event => {
    // notyf[event.detail.type](event.detail.message);
    notyf.open({
        type: event.detail.type,
        message: event.detail.message,
    });
});
window.addEventListener('swal:notif', event => {
    swal.fire({
        icon: event.detail.icon,
        title: event.detail.title,
        text: event.detail.text,
    });
});
window.addEventListener('swal:confirm', event => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('delete', event.detail.id);
        }
    });
});
window.addEventListener('swal:deleteMenu', event => {
    swal.fire({
        title: "Confirm Entry",
        text: "Are you sure all entries are correct",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: true
    })
        .then((confirmed) => {
            if (confirmed.value) {
                window.livewire.emit('deleteMenu', event.detail.id);
            }
        });
});
window.addEventListener('swal:deleteSubMenu', event => {
    swal.fire({
        title: "Confirm Entry",
        text: "Are you sure all entries are correct",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: true
    })
        .then((confirmed) => {
            if (confirmed.value) {
                window.livewire.emit('deleteSubMenu', event.detail.id);
            }
        });
});