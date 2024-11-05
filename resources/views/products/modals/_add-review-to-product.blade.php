<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Review To Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('products.reviews.save') }}" method="POST">
            {{ csrf_field() }}

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="modal-body">

                <div class="ratings">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="comment" class="mb-2"><b>Rating (1-5)</b></label>
                            <div class="stars" style="width:100%;background-color:#eee;padding:20px;display:flex;justify-content:center">

                                <label for="one" style="text-align:center">
                                    <input id="one" type="radio" name="rating" value="1" required> <br>
                                    <i class="fa fa-star" style="color:orange"></i>
                                </label>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <label for="two" style="text-align:center">
                                    <input id="two" type="radio" name="rating" value="2" required><br>
                                    <i class="fa fa-star" style="color:orange"></i>    
                                    <i class="fa fa-star" style="color:orange"></i>    
                                </label>
                                
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                <label for="three" style="text-align:center">
                                    <input id="three" type="radio" name="rating" value="3" required><br>
                                    <i class="fa fa-star" style="color:orange"></i>    
                                    <i class="fa fa-star" style="color:orange"></i><br>
                                    <i class="fa fa-star" style="color:orange"></i>
                                </label>
                                
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                <label for="four" style="text-align:center">
                                    <input id="four" type="radio" name="rating" value="4" required><br>
                                    <i class="fa fa-star" style="color:orange"></i>    
                                    <i class="fa fa-star" style="color:orange"></i><br>
                                    <i class="fa fa-star" style="color:orange"></i>
                                    <i class="fa fa-star" style="color:orange"></i>
                                </label>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                <label for="five" style="text-align:center">
                                    <input id="five" type="radio" name="rating" value="5" required><br>
                                    <i class="fa fa-star" style="color:orange"></i>    
                                    <i class="fa fa-star" style="color:orange"></i><br>
                                    <i class="fa fa-star" style="color:orange"></i>
                                    <i class="fa fa-star" style="color:orange"></i>
                                    <i class="fa fa-star" style="color:orange"></i>
                                </label>

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="comment">
                    <div class="form-group">
                        <label for="comment" class="mb-2"><b>Comment</b></label>
                        <textarea name="comment" id="comment" rows="4" class="form-control" required></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Review</button>
            </div>
            
        </form>
      </div> 
    </div>
  </div>
</div>