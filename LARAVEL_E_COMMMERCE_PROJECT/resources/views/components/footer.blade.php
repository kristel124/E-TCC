<footer class="bg-card border-t border-border mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            {{-- Company Info --}}
            <div>
                <h3 class="text-lg font-bold mb-4 text-foreground">TCC (The Carry Collection)</h3>
                <p class="text-muted-foreground text-sm">
                    Premium leather bags and accessories for the modern sophisticate.
                </p>
            </div>
            
            {{-- Shop Links --}}
            <div>
                <h4 class="text-sm font-semibold mb-4 text-foreground uppercase tracking-wide">Shop</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">All Bags</a></li>
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">Totes</a></li>
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">Crossbody</a></li>
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">Clutches</a></li>
                </ul>
            </div>
            
            {{-- Support Links --}}
            <div>
                <h4 class="text-sm font-semibold mb-4 text-foreground uppercase tracking-wide">Support</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">Contact Us</a></li>
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">Shipping Info</a></li>
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">Returns</a></li>
                    <li><a href="#" class="text-muted-foreground hover:text-accent transition-colors">FAQ</a></li>
                </ul>
            </div>
            
            {{-- Social Media Links (Icons replaced with text placeholders) --}}
            <div>
                <h4 class="text-sm font-semibold mb-4 text-foreground uppercase tracking-wide">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-muted-foreground hover:text-accent transition-colors p-1 border rounded" aria-label="Instagram">
                        IG 
                    </a>
                    <a href="#" class="text-muted-foreground hover:text-accent transition-colors p-1 border rounded" aria-label="Facebook">
                        FB
                    </a>
                    <a href="#" class="text-muted-foreground hover:text-accent transition-colors p-1 border rounded" aria-label="Twitter">
                        X
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Copyright - FIXED: Used Blade syntax for dynamic year --}}
        <div class="mt-8 pt-8 border-t border-border text-center text-sm text-muted-foreground">
            <p>&copy; **{{ date('Y') }}** The Carry Collection. All rights reserved.</p>
        </div>
    </div>
</footer>