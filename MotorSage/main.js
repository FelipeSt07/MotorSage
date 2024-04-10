const btnDepartamentos = document.getElementById('btn-departamentos'),
        grid = document.getElementById('grid');

btnDepartamentos.addEventListener('mouseover', ()=> {
    grid.classList.add('activo');
});

grid.addEventListener('mouseleave', () => {
    grid.classList.remove('activo');
})


