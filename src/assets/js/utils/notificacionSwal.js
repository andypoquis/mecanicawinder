const notificacionSwal = (titleText, text, icon, confirmButtonText) => {
    Swal.fire({
        titleText: titleText,
        text: text,
        icon: icon, // warning, error, success, info
        confirmButtonText: confirmButtonText
    });
};

const notificacionSwal_HTML = (titleText, html, icon, confirmButtonText) => {
    Swal.fire({
        titleText: titleText,
        html: html,
        icon: icon, // warning, error, success, info
        confirmButtonText: confirmButtonText
    });
};

const notificacionSwal_Toast = (icon, title, timer = 4000) => {
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        }
    });

    Toast.fire({
        icon: icon,
        title: title
    });
};

export { notificacionSwal, notificacionSwal_HTML, notificacionSwal_Toast };
