@extends('components.platinumLayout')
@section('platinum')
<style>
    .header-title {
        text-align: left;
        margin-right: 20px;
        font-size: 24px;
        font-weight: bold;
    }
    .manage-publications-box {
        margin: 50px auto;
        width: 60%;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .manage-publications-box h2 {
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: bold;
    }
    .buttons-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
    .publication-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45%;
        margin: 10px 0;
        padding: 15px;
        background-color: #11101d;
        color: #ffffff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .publication-button:hover {
        background-color: #575757;
    }
    .publication-button i {
        margin-right: 10px;
        font-size: 18px;
    }
</style>
<div class="header-title">Publications</div>
<div class="manage-publications-box">
    <h2>Manage Publications:</h2>
    <div class="buttons-container">
        <button class="publication-button" onclick="redirectTo('search')">
            <i class='bx bx-search'></i> Search Publications
        </button>
        <button class="publication-button" onclick="window.location.href='{{ route('listpublication') }}'">
            <i class='bx bx-list-ul'></i> List Publications
        </button>
        <button class="publication-button" onclick="redirectTo('upload')">
            <i class='bx bx-upload'></i> Upload Publications
        </button>
        <button class="publication-button" onclick="redirectTo('delete')">
            <i class='bx bx-trash'></i> Delete Publications
        </button>
    </div>
</div>

<script>
    function redirectTo(action) {
        switch(action) {
            case 'search':
                // Add your search redirection logic here
                break;
            case 'list':
                window.location.href = "{{ route('listpublications') }}";
                break;
            case 'upload':
                // Add your upload redirection logic here
                break;
            case 'delete':
                // Add your delete redirection logic here
                break;
            default:
                break;
        }
    }
</script>
@endsection
