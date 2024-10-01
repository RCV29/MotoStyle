<x-app-layout>
    <h1>Create communities</h1>
    <form method="post" action="{{route('communitystore')}}">
        @csrf
        @method('post')
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