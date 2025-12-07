BITS 64

section .data
	data: dq 1, 2, 3, 4, 5, 6
	len: dq 6

section .text
	global _start

_start:
	mov rcx, [len]
	mov rdx, data
	mov rax, rcx
	mov rbx, 0
	cmp rcx, 0
	jz stop
	mov r9, [rdx]
loop:
	mov r8, rcx
	sub r8, rax
	shl r8, 3
	add r8, rdx
	mov r8, [r8]
	mov r10, r8
	sub r8, r9
	cmp r8, 0
	jle lower_i0
	jmp higher_i0
lower_i0:
	add rbx, r10
	jmp loop_bot
higher_i0:
	sub rbx, r10
	jmp loop_bot
loop_bot:
	dec rax
	cmp rax, 0
	jle stop
	jmp loop
stop:
	int 3
