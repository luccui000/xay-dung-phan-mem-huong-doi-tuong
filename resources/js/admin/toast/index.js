export function toastSuccess(heading, text) {
    $.toast({
        heading: heading,
        text: text,
        position: 'top-right',
        stack: false,
        icon: 'success'
    })
}

export function toastError(heading, text) {
    $.toast({
        heading: heading,
        text: text,
        position: 'top-right',
        stack: false,
        icon: 'error'
    })
}
