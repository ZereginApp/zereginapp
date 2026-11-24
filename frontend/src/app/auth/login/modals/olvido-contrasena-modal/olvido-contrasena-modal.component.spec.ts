import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OlvidoContrasenaModal } from './olvido-contrasena-modal.component';

describe('OlvidoContrasenaModal', () => {
  let component: OlvidoContrasenaModal;
  let fixture: ComponentFixture<OlvidoContrasenaModal>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [OlvidoContrasenaModal]
    })
    .compileComponents();

    fixture = TestBed.createComponent(OlvidoContrasenaModal);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
