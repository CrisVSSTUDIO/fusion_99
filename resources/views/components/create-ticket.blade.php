  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Qual a sua dúvida?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="title" class="form-label">Titulo</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter title">
                      </div>
                      <div class="mb-3">
                          <label for="description" class="form-label">Descrição</label>
                          <textarea class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
                      </div>
                      <div class="mb-3">
                          <label for="priority" class="form-label">Prioridade</label>
                          <select class="form-select" id="priority">
                              <option value="high" class="text-danger">Alta</option>
                              <option value="medium" class="text-warning">Média</option>
                              <option value="low" class="text-success">Baixa</option>
                          </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                  </form>

              </div>
              <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              </div> -->
          </div>
      </div>
  </div>