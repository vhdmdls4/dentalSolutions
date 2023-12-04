<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2 class="mt-4">Cadastro de Profissional</h2>
    <form id="cadastroFuncionario" action="" aria-label="Formulário de Cadastro de Funcionário">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" aria-label="Funcionário" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Nome de Usuário:</label>
            <input type="text" class="form-control" id="username" name="username" aria-label="Nome de Usuário" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" aria-label="E-mail" readonly required>
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="rg" name="rg" aria-label="Senha" required>
        </div>
        <div class="mb-3">
            <label for="perfil" class="form-label">Função:</label>
            <select class="form-select" id="perfil" name="perfil" aria-label="Perfil" required>
                <option value="admin">Administrador</option>
                <option value="Secretário">Auxiliar</option>
                <option value="Secretário">Secretário</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">Salário fixo (R$):</label>
            <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="number" class="form-control" id="salarioFixo" name="salarioFixo" aria-label="Salário Fixo" required>
            </div>
        </div>
        <div id="infoDentista" style="display: none;">
            <div class="mb-3">
                <label for="cro" class="form-label">CRO (Conselho Regional de Odontologia):</label>
                <input type="text" class="form-control" id="cro" name="cro" aria-label="CRO">
            </div>
            <div class="mb-3">
                <label for="especialidades" class="form-label">Especialidades:</label>
                <input type="text" class="form-control" id="especialidades" name="especialidades" aria-label="Especialidades">
            </div>
            <div class="mb-3">
                <label for="percentualParticipacao" class="form-label">Percentual de Participação:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="percentualParticipacao" name="percentualParticipacao" aria-label="Percentual de Participação" min="0" max="100">
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" aria-label="Cadastrar">Cadastrar</button>
            <div id="mt-5 mensagem"></div>
        </div>
    </form>
    <script type="module">
        // Captura o elemento de nome de usuário
        const usernameInput = document.getElementById('username');
        // Captura o elemento de nome
        const nomeInput = document.getElementById('nome');
        // Captura o elemento de e-mail
        const emailInput = document.getElementById('email');

        // Adiciona um ouvinte de evento para reagir a mudanças no nome de usuário
        usernameInput.addEventListener('input', () => {
            // Atualiza o valor do campo de e-mail com o nome de usuário + @dentesoft.com
            const username = usernameInput.value.trim();
            emailInput.value = `${username}@dentesoft.com`;
        });

        // Inicia o valor do campo de e-mail com @dentesoft.com
        emailInput.value = '@dentesoft.com';

        document.getElementById('perfil').addEventListener('change', function() {
            var infoDentista = document.getElementById('infoDentista');
            if (this.value === 'Dentista' || this.value === 'DentistaParceiro') {
                infoDentista.style.display = 'block';
            } else {
                infoDentista.style.display = 'none';
            }
        });
    </script>
</main>

<?php require_once('./footer.php'); ?>
