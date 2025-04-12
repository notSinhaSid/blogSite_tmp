<form action="" method="post" class=" form-group mt-3" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="AuthorName" class="form-label">Author's Name</label>
        <input type="text" name="authName" class="form-control">
    </div>
    <div class="mb-3">
        <label for="BlogCategory" class="form-label">Blog Category</label>
        <select name="blogCat" id="" class="form-select">
            <option value="disabled">Select a Category</option>
            <option value="1">WebDev</option>
            <option value="2">DevOps</option>
            <option value="3">aiml</option>
            <option value="4">android</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="BlogTitle" class="form-label">Blog Title</label>
        <input type="text" name="blogTitle" class="form-control">
    </div>
    <div class="mb-3">
        <label for="blogImg" class="form-label">Blog Post image</label>
        <input class="form-control form-control-sm" id="blogImg" type="file" name="blogImg">
    </div>
    <div class="mb-3">
        <label for="BlogContent" class="form-label">Blog Content</label>
        <textarea type="text" rows="10" cols="50" name="blogContent" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-md btn-outline-success offset-lg-5" name="add">Create</button>
    </div>
</form>