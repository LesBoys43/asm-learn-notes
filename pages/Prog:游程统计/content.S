BITS 64

section .data
	val: dq 13915

section .text
	global _start

_start:
	mov rdx, [val]
	mov rbx, 0
	mov r9, rdx
	shr r9, 64
	and r9, 1
	mov rax, r9
	mov rcx, 64
loop:
	mov r8, rdx
	shr r8, rcx
	and r8, 1
	cmp r8, rax
	jne inc_run
	jmp loop_cb
inc_run:
	inc rbx
	jmp loop_cb
loop_cb:
	mov rax, r8
	dec rcx
	cmp rcx, 0
	jle stop
	jmp loop
stop:
	int 3
