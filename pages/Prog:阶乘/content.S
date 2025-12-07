BITS 64

section .data
	val: dw 14

section .text
	global _start

_start:
	movzx rdx, word [val]
	mov rbx, 1
	mov rax, rdx
	cmp rdx, 21
	jg stop
loop:
	imul rbx, rax
	dec rax
	cmp rax, 0
	jle stop
	jmp loop
stop:
	int 3
