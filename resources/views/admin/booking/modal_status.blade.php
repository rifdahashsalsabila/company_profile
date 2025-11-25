<div class="modal fade" id="statusModal{{ $booking->id }}" tabindex="-1" aria-labelledby="statusModalLabel{{ $booking->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm rounded-3 border-0">
            <div class="modal-header bg-light text-dark border-bottom">
                <h5 class="modal-title" id="statusModalLabel{{ $booking->id }}">Ubah Status Booking</h5>
                <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p><strong>Customer:</strong> {{ $booking->user->name }}</p>
                    <p><strong>Layanan:</strong> {{ $booking->layanan }}</p>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control shadow-sm bg-light" required>
                            <option value="menunggu_konfirmasi" {{ $booking->status == 'menunggu_konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                            <option value="dikonfirmasi" {{ $booking->status == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                            <option value="dalam_antrian" {{ $booking->status == 'dalam_antrian' ? 'selected' : '' }}>Dalam Antrian</option>
                            <option value="menuju_alamat" {{ $booking->status == 'menuju_alamat' ? 'selected' : '' }}>Menuju Alamat</option>
                            <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan" {{ $booking->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light shadow-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-secondary shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
