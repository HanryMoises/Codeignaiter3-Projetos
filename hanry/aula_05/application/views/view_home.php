<?php $i = 1;
$qt = array(); ?>


<div class="container">

  <div class=" row col col-md-10 mt-5  offset-md-1   ">

    <div class="card overflow-auto shadow-lg border border-2" style="height : 40rem;">

      <div class="card-body">
        <h2 class="card-title">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
            class="bi bi-currency-exchange" viewBox="0 0 16 16">
            <path
              d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
          </svg>
          Produtos
        </h2>

        <nav>
    <hr style='width:20rem;'>
    <a class=" btn border-0 "  href="<?php echo base_url("resultado/home"); ?>">Página inicial</a>

    <a class="btn border-0 " href="<?php echo base_url("resultado/preco"); ?>">Menor Preco</a>

    <a class="btn border-0 " href="<?php echo base_url("resultado/quantidade"); ?>">Maior</a>
    <hr style='width:20rem;'>
  </nav>  

        <p class="card-text">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Quantidade</th>
              <th scope="col">
                <!-- botão Cadastrar -->
                <button type="button" class="btn border border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                  </svg>
                </button>
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody class="overflow-auto">
            <?php foreach ($produtos as $p) { ?>
                <tr>
                  <?php array_push($qt, $p["id"]); ?>
                  <th scope="row">
                    <?php echo $p["id"];
                    $_SESSION['id'] = $p["id"] ?>
                  </th>
                  <td>
                    <?php echo $p['descricao']; ?>
                  </td>
                  <td>
                    <?php echo $p['preco']; ?>
                  </td>
                  <td>
                    <?php echo $p['quantidade']; ?>
                  </td>
                  <td>
                    <!-- botão editar -->
                    <!-- btn editar criar botões com id's diferentes, -->
                    <button id="btn_editar<?php print($i++); ?>" onclick="request_id_edit(this.id)"
                      value="<?php echo $p["id"] ?>" type="button" class="btn border border-0" data-bs-toggle="modal"
                      data-bs-target="#modal_editar">
                      <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                      </svg>
                    </button>
                  </td>
                  <td>
                    <!-- botão exluir -->
                    <button id="btn_excluir<?php print($i++); ?>" onclick="request_id_remove(this.id)"
                      value="<?php echo $p["id"] ?>" type="button" class="btn border border-0" data-bs-toggle="modal"
                      data-bs-target="#modal_remover">
                      <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path
                          d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                      </svg>
                    </button>


                  </td>
                </tr>
            <?php } ?>

          </tbody>
        </table>
        </p>

      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modal_editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">

        <input type="hidden" id="teste" disabled>
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input id="n_desc" type="text" class="form-control" id="floatingInput" placeholder="Descrição" require>
          <label for="floatingInput">Descrição</label>
        </div>
        <div class="form-floating">
          <input id="n_qtde" type="number" class="form-control" id="floatingPassword" min=1 placeholder="Quantidade"
            require>
          <label for="floatingPassword">Quantidade</label>
        </div>

        <div class="form-floating mt-3">
          <input id="n_preco" type="number" class="form-control" id="floatingPassword" min=1 placeholder="Preço"
            require>
          <label for="floatingPassword">Preço</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-dismiss="modal">cancelar</button>
        <button id="editar" type="button" class="btn btn-outline-danger rounded-pill">Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Excluir-->
<div class="modal fade" id="modal_remover" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id='teste1' disabled>
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Deseja remover este produto ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-dismiss="modal">Cancelar</button>
        <button id="remover" type="button" class="btn btn-outline-danger rounded-pill">Remover</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cadastrar-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input id="desc" type="text" class="form-control" id="floatingInput" placeholder="Descrição" require>
          <label for="floatingInput">Descrição</label>
        </div>
        <div class="form-floating">
          <input id="qtde" type="number" class="form-control" id="floatingPassword" min=1 placeholder="Quantidade"
            require>
          <label for="floatingPassword">Quantidade</label>
        </div>

        <div class="form-floating mt-3">
          <input id="preco" type="number" class="form-control" id="floatingPassword" min=1 placeholder="Preço" require>
          <label for="floatingPassword">Preço</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-dismiss="modal">Cancelar</button>
        <button id="cadastro" type="button" class="btn btn-outline-danger rounded-pill">Cadastrar </button>
      </div>
    </div>
  </div>
</div>

<?php $i++; ?>
<script>

  function url() {
    var url = window.location.href
    return window.location.href = url
  }
  function request_id_edit(p) {
    $("#teste").val($("#" + p).val());
    $.ajax({
      method: "POST",
      url: "http://localhost/hanry/aula_05/index.php/home/buscar",
      data: { id: $("#teste").val() },
      success: function (result) {
        // convert a string em objeto
        var r = JSON.parse(result)
        //  for usado para objetos
        r.forEach(e => {
          $("#n_desc").val(e["descricao"])
          $("#n_preco").val(e["preco"])
          $("#n_qtde").val(e["quantidade"])
        });
      }
    })
  }
  function request_id_remove(p) {
    $("#teste1").val($("#" + p).val());


  }

  // faz o insert no banco de dados e recarrega a página
  $("#cadastro").click(() => {
    $.ajax({
      method: "POST",
      url: "http://localhost/hanry/aula_05/index.php/home/inserir",
      data: {
        desc: $("#desc").val(),
        preco: $("#preco").val(),
        qtde: $("#qtde").val(),
      },
      success: function (result) {
        url();
      }
    })
  });
  // faz uma chamada para o item
  $("#editar").click(() => {
    $.ajax({
      method: "POST",
      url: "http://localhost/hanry/aula_05/index.php/home/editar",
      data: {
        id: $("#teste").val(),
        desc: $("#n_desc").val(),
        preco: $("#n_preco").val(),
        qtde: $("#n_qtde").val()
      },
      success: function (result) {
        alert("Dados alterados com sucesso!")
        url()
      }
    })
  });

  $("#remover").click(() => {
    $.ajax({
      method: "POST",
      url: "http://localhost/hanry/aula_05/index.php/home/remover",
      data: { id: $("#teste1").val() },
      success: function (result) {
        alert("Produto removido com sucesso!")
        url()
      }
    })
  })

</script>