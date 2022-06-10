<form action="{{('/categorias')}}" method="post" enctype="multipart" >
    @csrf
                     
                    <div class="modal-body">                      
                        <div class="form-group">
                          <label for="nombreCategoria">Nombre Categoria</label>
                          <input type="text" name="nombreCategoria" class="form-control" id="nombreCategoria"placeholder="Ingrese el nombre de la categoria">  
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar categoria</button>
                    </div>
                    </form>