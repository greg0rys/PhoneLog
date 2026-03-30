@extends('layouts.app')

@section('content')
    <main class="container">
        @if(session('success'))
            <div
                style="color: green; margin-bottom: 1rem; padding: 10px; background-color: #e6ffe6; border: 1px solid #b3ffb3; border-radius: 5px;">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <h3>Contact Us</h3>

            <div class="grid">
                <label for="name">
                    Name
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </label>

                <label for="phone_number">
                    Phone Number
                    <input type="tel" id="phone_number" name="phone_number" placeholder="(555) 555-5555" required>
                </label>
            </div>

            <label for="email">
                Email address
                <input type="email" id="email" name="email" placeholder="email@example.com" required>
            </label>

            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="" selected disabled>Select a category…</option>
                <option value="support">Support</option>
                <option value="sales">Sales</option>
                <option value="feedback">Feedback</option>
            </select>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Your message..." required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </main>
@endsection