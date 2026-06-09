function EventoClick() {
    const mostrarMensaje = () => {
        alert("Has hecho clic");
    };

    return <button onClick={mostrarMensaje}>Presionar</button>;
}

export default EventoClick;
