<div style="width: 60%; margin: 0 auto">
    <form action="{{ route('registerPost') }}" method="post" style="display: grid">
        @csrf
        <input type="text" name="fullName" placeholder="fullName">
        <input type="text" name="organization" placeholder="organization">
        <input type="text" name="position" placeholder="position">
        <input type="text" name="country" placeholder="country">
        <input type="text" name="email" placeholder="email">
        <input type="file" name="photo" placeholder="photo">
        <button type="submit">send</button>
    </form>

</div>
