## Instruções

**Configurações antes de codificar**

1 - No arquivo 'DefineCredenciais.php' definir as variaveis de acordo com as configurações do seu banco de dados local.

2 - Criar um banco de dados chamado entrevista.

3 - Importar os dados do arquivo 'entrevista.sql'.

**Modificar Tela de Listagem de Usuários**

1 - Exibir a data de cadastro no formato DD/MM/AAAA

2 - Ter uma coluna de ações, com botões para editar e deletar

3 - Em caso de não trazer registro, ter uma mensagem "nenhum registro encontrado" e não exibir a mensagem

4 - Criar uma area de filtro, que possa buscar por nome e cpf

5 - Exibir CPF no padrão ###.###.###-##

**Modificar Tela de Cadastro de Usuários**

1 - Criar validação para não permitir salvar sem preencher todos os campos

2 - Após salvar redirecionar para tela de listagem, e mostrar mensagem de sucesso.

**Novas Funcionalidades**

1 - Possibilitar deletar registro

2 - Possibilitar edição dos dados.

3 - Criar menu com acesso as telas de cadastro e listagem.

4 - Criar CRUD de perfil e fazer o relacionamento com usuário

**Melhorias não obrigatórias - Pontos Extras**

1 - Exibir na listagem o perfil do usuário

2 - Incluir e usar a biblioteca Bootstrap ou Materialize

3 - Incluir e usar a biblioteca Jquery ou Vue JS

4 - Nesta tela de instruções, criar checkbox para marcar que a tarefa foi concluida e salvar este estado sem usar a session do PHP e nem o banco de dados.

5 - criar este mesmo projeto, só que utilizando o framework laravel
