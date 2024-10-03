<x-app-layout>
    <h1>Create Motor</h1>
    <form method="post" action="{{route('motorstore')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label>Image</label>
            <input type="file" name="image" placeholder="upload image"/>
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name"/>
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="description"/>
        </div> 
        <div>
            <input type="submit" value="save a new motor"/>
        </div>

</x-app-layout>