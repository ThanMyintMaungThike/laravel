<form action="{{route('categories.store')}}" method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name='name'>
    </div>
    <div>
        <label for="">Description</label>
        <input type="text" name="description" id="">
    </div>
    <div>
        <label for="">Status</label>
        <select name="status" id="">
            <option value="1">true</option>
            <option value="0">false</option>
        </select>
    </div>
    <button value="submit">Submit</button>
</form>
