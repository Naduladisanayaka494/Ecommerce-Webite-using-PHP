<div class="container mt-5">
<h1 class="text-center">Edit Product</h1>
  <form action="" method="post" enctype="multipart/form-data">
         <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required">
         </div>
                <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Discription</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required="required">
         </div>
         <div class="form-outline w-50 m-auto mb-4">
                                      <label for="product_title" class="form-label">Product Categories</label>
               <select name="product_category" class="form-select">

                <option value="">1</option>
                  <option value="">2</option>
                    <option value="">3</option>
                      <option value="">4</option>
                        <option value="">5</option>

               </select>
         </div>
                <div class="form-outline w-50 m-auto mb-4">
          <label for="product_title" class="form-label">Product Brands</label>
               <select name="product_brands" class="form-select">
                <option value="">1</option>
                  <option value="">2</option>
                    <option value="">3</option>
                      <option value="">4</option>
                        <option value="">5</option>

               </select>
         </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Image1</label>
            <giv class="d-flex"></giv>
            <input type="file" id="product_image1"  name="product_image1"  class="form-control w-90 m-auto" required="required">
            <img src="./product_images/9a1c3a1d2cb2e9b4164e80c9ae7388bb.jpg" alt="" class="product_img">
         </div>
               <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Image2</label>
            <giv class="d-flex"></giv>
            <input type="file" id="product_image1"  name="product_image2"  class="form-control w-90 m-auto" required="required">
            <img src="./product_images/9a1c3a1d2cb2e9b4164e80c9ae7388bb.jpg" alt="" class="product_img">
         </div>
                  <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Image3</label>
            <giv class="d-flex"></giv>
            <input type="file" id="product_image3"  name="product_image3"  class="form-control w-90 m-auto" required="required">
            <img src="./product_images/9a1c3a1d2cb2e9b4164e80c9ae7388bb.jpg" alt="" class="product_img">
         </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required">
         </div>
         <div class="text-center w-50 m-auto">
          <input type="submit" name="edit_product" value="update product" class="btn btn-info px-3 mb-3" >
         </div>


  </form>
</div>