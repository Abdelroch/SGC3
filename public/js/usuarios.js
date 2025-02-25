
function editar(id, name, email, accessId) {
    // Preencher o modal com os dados da solicitação
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-email').value = email;
    document.getElementById('edit-accessId').value = accessId;


    // Atualizar o atributo 'action' do formulário
    const form = document.getElementById('edit-form');


    // Exibir o modal
    document.getElementById('editarModal').style.display = 'block';
}

// Fechar modais ao clicar fora deles
document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            modal.style.display = 'none';
        }
    });
});

// Abrir modal de cadastro
document.getElementById('cadastrarBtn').addEventListener('click', () => {
    document.getElementById('cadastrarModal').style.display = 'block';
});

// Fechar modal de cadastro ou edição ao clicar fora
window.addEventListener('click', (event) => {
    const cadastrarModal = document.getElementById('cadastrarModal');
    const editarModal = document.getElementById('editarModal');

    if (event.target === cadastrarModal) {
        cadastrarModal.style.display = 'none';
    } else if (event.target === editarModal) {
        editarModal.style.display = 'none';
    }
});
