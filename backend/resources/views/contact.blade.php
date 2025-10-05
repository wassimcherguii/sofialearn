@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Contact Us</h1>
    
    <div class="grid md:grid-cols-2 gap-8">
        <div>
            <h2 class="text-2xl font-semibold mb-4">Get in Touch</h2>
            <p class="mb-4">
                Have questions about SofiaLearn? We'd love to hear from you. 
                Send us a message and we'll respond as soon as possible.
            </p>
            
            <div class="space-y-2">
                <p><strong>Email:</strong> contact@sofialearn.com</p>
                <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                <p><strong>Address:</strong> 123 Learning Street, Education City, EC 12345</p>
            </div>
        </div>
        
        <div>
            <h2 class="text-2xl font-semibold mb-4">Send Message</h2>
            <form class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label for="message" class="block text-sm font-medium mb-1">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
