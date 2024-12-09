<div class="form" id="cadastrar-aluno">
  <form id="cadastrarUsuario" action="cadastrar.php" method="post">

    <div class="form-title">
      <h4> Dados Pessoais </h4>
    </div>

    <div class="system-info warning">
      <p> Os capos marcados com <abbr class="required"> * </abbr> são obrigatórios.</p>
    </div>

    <table>
      <input type="hidden" name="user-type" value="aluno"/>
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

<!--
    <div class="form-title">
      <h4> Dados de Contato </h4>
    </div>

    <table>

      <tr>
        <td> <label for="cep" class="form-label"> CEP <abbr class="required"> * </abbr></label> </td>
        <td> <label for="endereco" class="form-label"> Endereço <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="number" name="user-cep" class="form-input" required /></td>
        <td><input type="text" name="user-endereco" class="form-input" required /></td>
      </tr>
      <tr>
        <td> <label for="cidade" class="form-label"> Cidade <abbr class="required"> * </abbr></label> </td>
        <td> <label for="estado" class="form-label"> Estado <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="text" name="user-cidade" class="form-input" required /></td>
        <td style="position: absolute;">
          <select name="user-estado" class="form-select">
          	<option value="AC">Acre</option>
          	<option value="AL">Alagoas</option>
          	<option value="AP">Amapá</option>
          	<option value="AM">Amazonas</option>
          	<option value="BA">Bahia</option>
          	<option value="CE">Ceará</option>
          	<option value="DF">Distrito Federal</option>
          	<option value="ES">Espírito Santo</option>
          	<option value="GO">Goiás</option>
          	<option value="MA">Maranhão</option>
          	<option value="MT">Mato Grosso</option>
          	<option value="MS">Mato Grosso do Sul</option>
          	<option value="MG">Minas Gerais</option>
          	<option value="PA">Pará</option>
          	<option value="PB">Paraíba</option>
          	<option value="PR">Paraná</option>
          	<option value="PE">Pernambuco</option>
          	<option value="PI">Piauí</option>
          	<option value="RJ">Rio de Janeiro</option>
          	<option value="RN">Rio Grande do Norte</option>
          	<option value="RS">Rio Grande do Sul</option>
          	<option value="RO">Rondônia</option>
          	<option value="RR">Roraima</option>
          	<option value="SC">Santa Catarina</option>
          	<option value="SP">São Paulo</option>
          	<option value="SE">Sergipe</option>
          	<option value="TO">Tocantins</option>
          </select>
        </td>

      </tr>
      <tr>
        <td> <label for="numero-endereco" class="form-label"> Numero <abbr class="required"> * </abbr></label> </td>
        <td> <label for="complemento" class="form-label"> Complemento </label> </td>
      </tr>
      <tr>
        <td><input type="text" name="user-numero-endereco" class="form-input" required /></td>
        <td><input type="text" name="complemento" class="form-input" /></td>
      </tr>
      <tr>
        <td> <label for="telefone1" class="form-label"> Telefone ou celular <abbr class="required"> * </abbr></label> </td>
        <td> <label for="telefone2" class="form-label"> Outro telefone </label> </td>
      </tr>
      <tr>
        <td><input type="text" name="telefone1" class="form-input" required /></td>
        <td><input type="text" name="telefone2" class="form-input" /></td>
      </tr>
    </table>
-->

    <div class="form-submit-control">
      <button type="submit" class="form-submit">CADASTRAR</button>
    </div>

  </form>
</div>
<script src="js/ajax_cadastrar_usuario.js"> </script>
