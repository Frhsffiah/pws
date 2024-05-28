
@extends('components.platinumLayout')

@section('platinum')
  <!-- Expert List Section -->
  <section class="expert-list">
    <h2>Expert List</h2>
    <div class="expert-list-container">
      <!-- Display expert list here -->
      <!-- For now, let's just create a sample expert -->
      <div class="expert">
        <div class="expert-details">
          <h3>John Doe</h3>
          <p>Email: johndoe@example.com</p>
          <!-- Add more details as needed -->
        </div>
        <!-- Add edit and delete buttons -->
        <div class="expert-actions">
          <button>Edit</button>
          <button>Delete</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Search Expert Section -->
  <section class="search-expert">
    <h2>Search Expert</h2>
    <div class="search-expert-container">
      <input type="text" placeholder="Search by name or email">
      <button>Search</button>
    </div>
  </section>

  <!-- Add Expert Section -->
  <section class="add-expert">
    <h2>Add New Expert</h2>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <!-- Add more fields as needed -->
      <button type="submit">Add Expert</button>
    </form>
  </section>
@endsection
