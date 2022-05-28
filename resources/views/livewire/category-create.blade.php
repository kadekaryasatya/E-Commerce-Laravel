<div>
    <div class="row">
        <div class="col-md-5">
        <form wire:submit.prevent="store">
            <div class="form-group">
            <label>Category Name</label>
                <input wire:model="name" type="text" name="category_name" class="form-control" placeholder="Category Name" autofocus>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
