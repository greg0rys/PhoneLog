@extends('layouts.app')

@section('content')
    <main class="container">
        <section style="text-align: center; padding: 3rem 0; margin-bottom: 2rem;">
            <hgroup>
                <h1>Welcome to the Call Log System</h1>
                <p>Manage, search, and track call histories for Stephens Law Group.</p>
            </hgroup>
        </section>

        <div class="grid">

            <article>
                <header>
                    <strong>Search Call Records</strong>
                </header>
                <p>Find specific call logs by caller name, phone number, or date range.</p>
                <footer>
                    <a href="{{ url('cdr/number_search') }}" role="button" class="outline">Search Records</a>
                </footer>
            </article>

            <article>
                <header>
                    <strong>Manage Contacts</strong>
                </header>
                <p>View and update client contact information and their associated histories.</p>
                <footer>
                    <a href="{{ url('contact') }}" role="button" class="outline secondary">View Contacts</a>
                </footer>
            </article>

            <article>
                <header>
                    <strong>Upload Call Logs</strong>
                </header>
                <p>Import new CSV files to automatically parse and add new call logs.</p>
                <footer>
                    <a href="{{ url('parse') }}" role="button" class="outline contrast">Upload CSV</a>
                </footer>
            </article>

        </div>
    </main>
@endsection