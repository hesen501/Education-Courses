<div class="form-group mb-4">
    <div class="col-md-12 border-bottom p-2">
        <h1 class="col-md-12 p-0" >Section</h1>
        <input type="text" name="section_names[]" value="" placeholder="section name" >
        <div id="lectures">
            <div class="row lecture">
                <div class="col-10">
                    <h2 class="col-md-12 p-0">Lecture</h2>
                    <button type="button" id="create-lecture" class="btn btn-success" >Add lecture</button>
                </div>
                <div class="col-1">
                    <button type="button" id="delete_section" class="btn btn-danger">Delete Section</button>
                </div>
                </div>
                <label for="">Lecture Name</label> 
                <input type="text" value="" name="lecture_names[]" placeholder="name"
                    class="form-control p-0 border-2">
                <label for="">Lecture Description</label> 
                <textarea name="lecture_descriptions[]"
                    class="form-control p-0 border-2"></textarea>
                <label for="">Lecture Link</label>
                <input type="text" value="" name="lecture_links[]" placeholder="link"
                    class="form-control p-0 border-2">
                <label for="">Lecture File</label>
                <input type="file" name="lecture_files[]" placeholder=""
                    class="form-control p-0 border-2">
                <label for="">Lecture Video</label>
                <input type="file" name="lecture_videos[]" placeholder=""
                    class="form-control p-0 border-2">
                <input type="hidden" name="section_ids[]=" >
            <div>
        </div>
    </div>
</div>