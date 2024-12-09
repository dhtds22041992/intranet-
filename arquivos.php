<div class="arquivos">
  <div class="upload">
    <form enctype="multipart/form-data" action="upload_file.php" method="POST">
      <div class="form-title">
        <h4> Upload de arquivos </h4>
      </div>
      <label for="selecionar-arquivo" id="input-selecionar-arquivo"> Selecione um arquivo </label>
      <input type="hidden" name="MAX_FILE_SIZE" value="26214400" />
      <input type="file" id="selecionar-arquivo" name="arquivo" class="form-input" style="display:none" required>
      <button type="submit" class="form-submit"> Enviar </button>
      <div class="select-option">
        <input type="checkbox" id="check-if-public" name="visibilidade" value='public'>
        <label for="check-if-public"> Este arquivo é público </label>
      </div>
    </form>
    <?php
      include('list_file.php');
    ?>

    <script>
      $("input#selecionar-arquivo").change(function(){
        var nomeArquivo = $("input#selecionar-arquivo").val().split("\\")[2];
        $("label#input-selecionar-arquivo").html(nomeArquivo);
      });

    </script>
  </div>
</div>
