<div class="form" id="cadastrar-professor">
  <form id="cadastrarUsuario" action="cadastrar.php" method="post">

    <div class="form-title">
      <h4> Dados Pessoais </h4>
    </div>

    <div class="system-info warning">
      <p> Os capos marcados com <abbr class="required"> * </abbr> são obrigatórios.</p>
    </div>

    <table>
      <input type="hidden" name="user-type" value="professor"/>
      <tr>
        <td> <label for="first-name" class="form-label"> Nome <abbr class="required"> * </abbr></label> </td>
        <td> <label for="last-name" class="form-label"> Sobrenome <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="text" name="user-first-name" class="form-input" required /></td>
        <td><input type="text" name="user-last-name" class="form-input" required /></td>
      </tr>
      <tr>
        <td> <label for="birthdate" class="form-label"> Data de Nascimento <abbr class="required"> * </abbr></label> </td>
        <td> <label for="sexo" class="form-label"> Sexo <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="date" name="user-birthdate" class="form-input" required /></td>
        <td>
          <input type="radio" name="user-sexo" id="radio1" value="f" class="form-radio-input"> <label for="radio1"> Feminino </label>
          <input type="radio" name="user-sexo" id="radio2" value="m" class="form-radio-input"> <label for="radio2"> Masculino </label>
          <input type="radio" name="user-sexo" id="radio3" value="o" class="form-radio-input"> <label for="radio3"> Outro </label>
        </td>
      </tr>
    </table>

    <div class="form-title">
      <h4> Dados de Logon </h4>
    </div>

    <table>
      <tr>
        <td> <label for="username" class="form-label"> Nome de usuário <abbr class="required"> * </abbr></label> </td>
        <td> <label for="email" class="form-label"> E-mail <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="text" name="user-username" class="form-input" required /></td>
        <td><input type="email" name="user-email" class="form-input" required /></td>
      </tr>
    </table>
    <div class="system-info warning"> 
      <p> A senha será gerada automáticamente. Solicite que o usuário troque no primeiro acesso.</p>
    </div>

    <div class="form-submit-control">
      <button type="submit" class="form-submit">CADASTRAR</button>
    </div>

  </form>
</div>
<script src="js/ajax_cadastrar_usuario.js"> </script>
