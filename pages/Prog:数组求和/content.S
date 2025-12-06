section .data
    data: dw 1, 2, 3
    len:  dq 3

section .text
	global _start

_start:
	mov rcx, data
	mov rdx, len
	mov rax, rcx
	mov rbx, 0
	cmp rdx, 0
	jz :stop
	:loop
	mov r8, rcx
	sub r8, rax
	shl r8, 1
	add r8, rdx
	movzx r8, word ptr [r8]
	add rbx, r8
	dec rax
	cmp rax, 0
	jle :stop
	jmp :loop
	:stop
	ret
