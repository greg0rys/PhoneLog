@extends('layouts.app')

@section('content')
    <main class="container">
        <style>
            .hero {
                padding: 4rem 0;
                text-align: center;
            }

            .hero p.bio {
                max-width: 600px;
                margin: 0 auto 2rem auto;
            }

            section {
                padding: 3rem 0;
            }

            .tag {
                opacity: 0.7;
            }
        </style>

        @if(session('success'))
            <div
                style="color: green; margin-bottom: 1rem; padding: 10px; background-color: #e6ffe6; border: 1px solid #b3ffb3; border-radius: 5px;">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        <section class="hero" id="about">
            <hgroup>
                <h1>Hi, I'm John Doe.</h1>
                <p>I build things for the web.</p>
            </hgroup>
            <p class="bio">
                I'm a software engineer specializing in building exceptional digital experiences. Currently, I'm focused on
                building accessible, human-centered products using PHP, Laravel, and minimal CSS frameworks.
            </p>
            <div class="grid" style="max-width: 400px; margin: 0 auto;">
                <a href="#projects" role="button">View My Work</a>
                <a href="https://github.com" target="_blank" role="button" class="secondary outline">GitHub</a>
            </div>
        </section>

        <hr>

        <section id="skills">
            <h2>Technologies I Use</h2>
            <div class="grid">
                <div>
                    <h3>Frontend</h3>
                    <ul>
                        <li>HTML5 & CSS3</li>
                        <li>Pico CSS & Tailwind</li>
                        <li>JavaScript (ES6+)</li>
                        <li>Vue.js</li>
                    </ul>
                </div>
                <div>
                    <h3>Backend</h3>
                    <ul>
                        <li>PHP & Node.js</li>
                        <li>Laravel & Express</li>
                        <li>MySQL & PostgreSQL</li>
                        <li>RESTful APIs</li>
                    </ul>
                </div>
                <div>
                    <h3>Tools</h3>
                    <ul>
                        <li>Git & GitHub</li>
                        <li>Docker</li>
                        <li>Linux / Server Admin</li>
                        <li>CI/CD</li>
                    </ul>
                </div>
            </div>
        </section>

        <hr>

        <section id="projects">
            <h2>Featured Projects</h2>
            <div class="grid">

                <article>
                    <header>
                        <strong>Call Log Management System</strong>
                    </header>
                    <p>A full-stack application built for a law firm to parse, manage, and search through thousands of legal
                        call records.</p>
                    <footer>
                        <small class="tag">PHP • Laravel • Pico CSS</small><br><br>
                        <div class="grid">
                            <a href="#" role="button" class="outline outline-sm">Live Demo</a>
                            <a href="#" role="button" class="secondary outline outline-sm">Source Code</a>
                        </div>
                    </footer>
                </article>

                <article>
                    <header>
                        <strong>E-Commerce REST API</strong>
                    </header>
                    <p>A robust backend API handling user authentication, inventory management, and secure payment
                        processing.</p>
                    <footer>
                        <small class="tag">Node.js • Express • MongoDB</small><br><br>
                        <div class="grid">
                            <a href="#" role="button" class="outline outline-sm">Documentation</a>
                            <a href="#" role="button" class="secondary outline outline-sm">Source Code</a>
                        </div>
                    </footer>
                </article>

            </div>
        </section>

        <hr>

        <section id="contact">
            <h2>Get In Touch</h2>
            <p>I'm currently looking for new opportunities. Whether you have a question or just want to say hi, my inbox is
                always open.</p>

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="grid">
                    <label for="name">
                        Name
                        <input type="text" id="name" name="name" placeholder="Jane Doe" required>
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

                <input type="hidden" name="category" value="Portfolio Inquiry">

                <label for="message">
                    Message
                    <textarea id="message" name="message" placeholder="Your message..." required></textarea>
                </label>

                <button type="submit">Send Message</button>
            </form>
        </section>

    </main>
@endsection