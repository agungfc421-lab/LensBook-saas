<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LensBook - Premium Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }
    </style>
</head>
<body class="bg-[#0b1120] text-slate-200 min-h-screen antialiased overflow-x-hidden selection:bg-indigo-500/30">

    <div class="fixed top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-600/20 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-fuchsia-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div id="authContainer" class="flex min-h-screen relative z-50 overflow-hidden">

        <div class="w-full lg:w-[45%] flex items-center justify-center px-6 sm:px-12 bg-[#0b1120]/80 backdrop-blur-md relative z-20 border-r border-white/[0.03]">
            <div class="w-full max-w-md bg-white/[0.02] border border-white/[0.06] p-8 sm:p-10 rounded-3xl shadow-[0_0_50px_-12px_rgba(0,0,0,0.7)] backdrop-blur-xl transition-all duration-500 hover:border-indigo-500/20">
                <div class="text-center mb-8">
                    <div class="inline-flex justify-center items-center w-14 h-14 rounded-2xl bg-gradient-to-tr from-indigo-500 to-fuchsia-500 mb-4 shadow-lg shadow-indigo-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <h2 id="authTitle" class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-300 tracking-tight">Welcome Back</h2>
                    <p id="authSubtitle" class="text-xs text-slate-400 mt-1.5">Sign in to your photography workspace.</p>
                </div>
                
                <form id="authForm" class="space-y-4">
                    <div class="space-y-1">
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">Email Address</label>
                        <input type="email" id="authEmail" placeholder="hello@studio.com" required class="w-full bg-slate-900/50 border border-slate-700/50 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-300">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">Password</label>
                        <input type="password" id="authPassword" placeholder="••••••••" required class="w-full bg-slate-900/50 border border-slate-700/50 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-300">
                    </div>
                    <button type="submit" id="btnAuthSubmit" class="w-full bg-gradient-to-r from-indigo-500 via-indigo-600 to-fuchsia-600 text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/40 hover:-translate-y-0.5 active:translate-y-0 active:scale-95 transition-all duration-200 mt-2 text-sm">
                        Access Workspace
                    </button>
                </form>

                <div class="text-center mt-6 pt-5 border-t border-white/[0.04]">
                    <button id="btnToggleAuth" class="text-xs font-medium text-slate-400 hover:text-indigo-400 transition-colors">Don't have an account? <span class="text-indigo-400 underline decoration-indigo-400/30 underline-offset-4">Sign up for free</span></button>
                </div>
            </div>
        </div>

        <div class="hidden lg:flex w-[55%] flex-col justify-between p-16 relative z-10 bg-gradient-to-br from-[#0f172a] via-[#0b1120] to-[#020617]">
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff03_1px,transparent_1px),linear-gradient(to_bottom,#ffffff03_1px,transparent_1px)] bg-[size:32px_32px]"></div>
            <div class="absolute top-1/4 right-1/4 w-72 h-72 bg-fuchsia-500/10 rounded-full blur-[100px]"></div>
            
            <div class="relative z-20 flex items-center space-x-2 opacity-80">
                <span class="w-2 h-2 rounded-full bg-indigo-500 shadow-[0_0_10px_rgba(99,102,241,0.5)]"></span>
                <span class="text-[10px] font-bold uppercase tracking-widest text-indigo-400">Next-Gen Studio Software</span>
            </div>

            <div class="relative z-20 my-auto max-w-lg">
                <h1 class="text-5xl font-extrabold tracking-tight text-white mb-6 leading-tight">
                    Manage your studio <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-violet-400 to-fuchsia-400">without the chaos.</span>
                </h1>
                <p class="text-slate-400 text-sm leading-relaxed mb-8">
                    LensBook memberikan kemudahan operasional menyeluruh untuk fotografer profesional dalam mengelola antrean jadwal, pencatatan transaksi uang muka (DP), hingga monitor pembayaran real-time dalam satu dasbor workspace terpadu.
                </p>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-white/[0.01] border border-white/[0.04] rounded-2xl">
                        <div class="text-xs font-bold text-white mb-1 flex items-center space-x-2">
                            <span class="text-indigo-400">✦</span> <span>Real-time Operations</span>
                        </div>
                        <p class="text-[11px] text-slate-500">Sinkronisasi instan ke server database cloud Supabase.</p>
                    </div>
                    <div class="p-4 bg-white/[0.01] border border-white/[0.04] rounded-2xl">
                        <div class="text-xs font-bold text-white mb-1 flex items-center space-x-2">
                            <span class="text-fuchsia-400">✦</span> <span>Secure Auth Gateway</span>
                        </div>
                        <p class="text-[11px] text-slate-500">Akses workspace terproteksi bagi multi-user manajemen.</p>
                    </div>
                </div>
            </div>

            <div class="relative z-20 flex justify-between items-center text-[11px] text-slate-500 border-t border-white/[0.04] pt-6">
                <div>© 2026 LensBook Workspace.</div>
                <div>All features unlocked.</div>
            </div>
        </div>    
    </div>

    <div id="dashboardContainer" class="hidden relative z-10">
        <!-- Floating Navbar -->
        <div class="container mx-auto px-6 pt-6">
            <header class="border border-white/[0.08] backdrop-blur-2xl bg-slate-900/40 rounded-2xl shadow-2xl">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-tr from-indigo-500 to-fuchsia-500 p-2.5 rounded-xl text-white shadow-lg shadow-indigo-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-300">LensBook</h1>
                            <div class="flex items-center space-x-2 mt-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse shadow-[0_0_10px_rgba(16,185,129,0.8)]"></span>
                                <p class="text-[10px] font-medium text-emerald-400/80 tracking-wider uppercase">Live Database Active</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-5">
                        <div class="hidden md:block px-4 py-1.5 rounded-full bg-white/[0.03] border border-white/[0.05]">
                            <span id="userDisplayEmail" class="text-xs font-medium text-slate-300"></span>
                        </div>
                        <button onclick="handleLogout()" class="text-xs font-bold bg-white/[0.05] border border-white/[0.08] hover:bg-rose-500/10 hover:border-rose-500/30 hover:text-rose-400 px-4 py-2 rounded-xl transition-all duration-300">
                            Log Out
                        </button>
                    </div>
                </div>
            </header>
        </div>

        <main class="container mx-auto px-6 py-8">
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="group bg-white/[0.02] border border-white/[0.05] p-6 rounded-3xl hover:bg-white/[0.04] hover:border-indigo-500/30 hover:-translate-y-1 hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Total Sesi</p>
                            <h3 id="statTotal" class="text-4xl font-extrabold text-white mt-2 tracking-tight">0</h3>
                        </div>
                        <div class="p-3 bg-indigo-500/10 text-indigo-400 rounded-2xl group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                    </div>
                </div>
                
                <div class="group bg-white/[0.02] border border-white/[0.05] p-6 rounded-3xl hover:bg-white/[0.04] hover:border-amber-500/30 hover:-translate-y-1 hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Menunggu DP</p>
                            <h3 id="statPending" class="text-4xl font-extrabold text-amber-400 mt-2 tracking-tight">0</h3>
                        </div>
                        <div class="p-3 bg-amber-500/10 text-amber-400 rounded-2xl group-hover:bg-amber-500 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                    </div>
                </div>

                <div class="group bg-white/[0.02] border border-white/[0.05] p-6 rounded-3xl hover:bg-white/[0.04] hover:border-emerald-500/30 hover:-translate-y-1 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Total Lunas</p>
                            <h3 id="statLunas" class="text-4xl font-extrabold text-emerald-400 mt-2 tracking-tight">0</h3>
                        </div>
                        <div class="p-3 bg-emerald-500/10 text-emerald-400 rounded-2xl group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Workspace Area -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-white/[0.02] border border-white/[0.05] p-8 rounded-3xl h-fit backdrop-blur-xl relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-fuchsia-500"></div>
                    
                    <h2 class="text-xl font-bold text-white mb-6">Create New Booking</h2>
                    <form id="bookingForm" class="space-y-5">
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">Nama Klien</label>
                            <input type="text" id="namaKlien" placeholder="Ex: Agung Wicaksono" required class="w-full bg-slate-900/60 border border-slate-700/50 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-300 placeholder:text-slate-600">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">Nomor WhatsApp</label>
                            <input type="tel" id="kontakKlien" placeholder="08xxxxxxxxxx" required class="w-full bg-slate-900/60 border border-slate-700/50 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-300 placeholder:text-slate-600">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">Tanggal Pelaksanaan</label>
                            <input type="date" id="tanggalFoto" required class="w-full bg-slate-900/60 border border-slate-700/50 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-300 [color-scheme:dark]">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">Paket Layanan</label>
                            <select id="paketFoto" class="w-full bg-slate-900/60 border border-slate-700/50 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-300">
                                <option value="Prewedding Outdoor">Prewedding Outdoor (Min. DP Rp500k)</option>
                                <option value="Studio Session">Studio Session (Min. DP Rp150k)</option>
                                <option value="Wedding Day Event">Wedding Day Event (Min. DP Rp1.5M)</option>
                                <option value="Cinematic Video Car">Cinematic Video Car (JDM/Performance)</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">DP Terbayar (Rp)</label>
                            <input type="number" id="jumlahDp" placeholder="Nominal transfer" required class="w-full bg-slate-900/60 border border-slate-700/50 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-300 placeholder:text-slate-600">
                        </div>
                        <button type="submit" class="w-full bg-white text-slate-900 font-bold py-3.5 rounded-xl text-sm shadow-lg hover:shadow-xl hover:bg-slate-100 hover:-translate-y-0.5 active:translate-y-0 active:scale-95 transition-all duration-200 mt-2">
                            Simpan Jadwal Booking
                        </button>
                    </form>
                </div>

                <!-- Table Data -->
                <div class="lg:col-span-2 bg-white/[0.02] border border-white/[0.05] rounded-3xl overflow-hidden backdrop-blur-xl flex flex-col shadow-2xl">
                    <div class="px-8 py-6 border-b border-white/[0.05] flex justify-between items-center bg-slate-900/20">
                        <h2 class="text-lg font-bold text-white">Database Antrean Jadwal</h2>
                        <span class="text-[10px] font-bold bg-white/[0.05] px-3 py-1 rounded-full text-slate-400 border border-white/[0.05]">Real-time Sync</span>
                    </div>
                    
                    <div class="overflow-x-auto p-4 flex-grow">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/[0.05]">
                                    <th class="py-4 px-4">Klien</th>
                                    <th class="py-4 px-4">Tanggal</th>
                                    <th class="py-4 px-4">Layanan</th>
                                    <th class="py-4 px-4 text-right">DP Masuk</th>
                                    <th class="py-4 px-4 text-center">Status</th>
                                    <th class="py-4 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="bookingTableBody" class="text-sm divide-y divide-white/[0.02]">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const SUPABASE_URL = "{{ env('SUPABASE_URL') }}";
        const SUPABASE_ANON_KEY = "{{ env('SUPABASE_ANON_KEY') }}";
        const _supabase = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

        let isLoginMode = true;

        const authContainer = document.getElementById('authContainer');
        const dashboardContainer = document.getElementById('dashboardContainer');
        const authForm = document.getElementById('authForm');
        const btnToggleAuth = document.getElementById('btnToggleAuth');
        const userDisplayEmail = document.getElementById('userDisplayEmail');

        btnToggleAuth.addEventListener('click', () => {
            isLoginMode = !isLoginMode;
            document.getElementById('authTitle').innerText = isLoginMode ? "Welcome Back" : "Create Account";
            document.getElementById('authSubtitle').innerText = isLoginMode ? "Sign in to your photography workspace." : "Start managing your studio effectively.";
            document.getElementById('btnAuthSubmit').innerText = isLoginMode ? "Access Workspace" : "Sign Up Free";
            btnToggleAuth.innerHTML = isLoginMode 
                ? `Don't have an account? <span class="text-indigo-400 underline decoration-indigo-400/30 underline-offset-4">Sign up for free</span>` 
                : `Already have an account? <span class="text-indigo-400 underline decoration-indigo-400/30 underline-offset-4">Log in here</span>`;
        });

        async function checkSession() {
            const { data } = await _supabase.auth.getSession();
            if (data.session) { showDashboard(data.session.user.email); } 
            else { showAuth(); }
        }

        function showDashboard(email) {
            authContainer.classList.add('hidden');
            dashboardContainer.classList.remove('hidden');
            userDisplayEmail.innerText = email;
            fetchBookings();
        }

        function showAuth() {
            authContainer.classList.remove('hidden');
            dashboardContainer.classList.add('hidden');
        }

        authForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('btnAuthSubmit');
            const originalText = btn.innerText;
            btn.innerText = "Processing...";
            
            const email = document.getElementById('authEmail').value;
            const password = document.getElementById('authPassword').value;

            if (isLoginMode) {
                const { data, error } = await _supabase.auth.signInWithPassword({ email, password });
                if (error) alert("Gagal Login: " + error.message);
                else showDashboard(data.user.email);
            } else {
                const { data, error } = await _supabase.auth.signUp({ email, password });
                if (error) alert("Gagal Registrasi: " + error.message);
                else alert("Pendaftaran Berhasil! Silakan cek kotak masuk/spam email Anda untuk konfirmasi.");
            }
            btn.innerText = originalText;
        });

        async function handleLogout() {
            await _supabase.auth.signOut();
            showAuth();
        }

        // --- CRUD ---
        const bookingForm = document.getElementById('bookingForm');
        const bookingTableBody = document.getElementById('bookingTableBody');

        async function fetchBookings() {
            bookingTableBody.innerHTML = '<tr><td colspan="6" class="py-8 text-center text-slate-500 text-xs">Memuat data dari database cloud...</td></tr>';
            let { data: bookings, error } = await _supabase.from('bookings').select('*').order('tanggal_foto', { ascending: true });
            if (error) return;

            document.getElementById('statTotal').innerText = bookings.length;
            document.getElementById('statPending').innerText = bookings.filter(b => b.status_pembayaran !== 'Lunas Total').length;
            document.getElementById('statLunas').innerText = bookings.filter(b => b.status_pembayaran === 'Lunas Total').length;

            bookingTableBody.innerHTML = '';
            
            if (bookings.length === 0) {
                bookingTableBody.innerHTML = '<tr><td colspan="6" class="py-8 text-center text-slate-500 text-xs italic">Belum ada data klien.</td></tr>';
            }

            bookings.forEach(b => {
                const isLunas = b.status_pembayaran === 'Lunas Total';
                bookingTableBody.innerHTML += `
                    <tr class="hover:bg-white/[0.03] transition-colors duration-200 group">
                        <td class="py-4 px-4">
                            <span class="font-bold text-white text-[13px]">${b.nama_klien}</span><br>
                            <span class="text-[11px] text-slate-400 opacity-80">${b.kontak_klien}</span>
                        </td>
                        <td class="py-4 px-4 font-mono text-[12px] text-slate-300">${b.tanggal_foto}</td>
                        <td class="py-4 px-4 text-[12px] text-slate-200">${b.paket_foto}</td>
                        <td class="py-4 px-4 text-right font-mono text-[12px] font-bold text-white">Rp ${Number(b.jumlah_dp).toLocaleString('id-ID')}</td>
                        <td class="py-4 px-4 text-center">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-full text-[9px] font-bold tracking-widest uppercase border ${isLunas ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-amber-500/10 text-amber-400 border-amber-500/20'}">
                                ${b.status_pembayaran}
                            </span>
                        </td>
                        <td class="py-4 px-4 flex justify-center items-center space-x-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-200">
                            ${isLunas ? '' : `<button onclick="updateStatus(${b.id})" class="text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 hover:bg-emerald-500 hover:text-white px-2.5 py-1.5 rounded-lg transition-all">Lunas</button>`}
                            <button onclick="deleteBooking(${b.id})" class="text-[10px] font-bold bg-rose-500/10 text-rose-400 border border-rose-500/20 hover:bg-rose-500 hover:text-white px-2.5 py-1.5 rounded-lg transition-all">Hapus</button>
                        </td>
                    </tr>`;
            });
        }

        bookingForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            btn.innerText = "Menyimpan...";
            
            await _supabase.from('bookings').insert([{
                nama_klien: document.getElementById('namaKlien').value,
                kontak_klien: document.getElementById('kontakKlien').value,
                tanggal_foto: document.getElementById('tanggalFoto').value,
                paket_foto: document.getElementById('paketFoto').value,
                jumlah_dp: document.getElementById('jumlahDp').value
            }]);
            bookingForm.reset(); 
            btn.innerText = "Simpan Jadwal Booking";
            fetchBookings();
        });

        async function updateStatus(id) {
            await _supabase.from('bookings').update({ status_pembayaran: 'Lunas Total' }).eq('id', id);
            fetchBookings();
        }

        async function deleteBooking(id) {
            if (confirm('Yakin ingin membatalkan dan menghapus booking ini?')) {
                await _supabase.from('bookings').delete().eq('id', id);
                fetchBookings();
            }
        }

        checkSession();
    </script>
</body>
</html>